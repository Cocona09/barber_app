// components/booking-steps/DateTimeSelection.jsx
import { useState, useEffect, useRef } from 'react';

export default function DateTimeSelection({bookingData, selectedService, selectedBarber, updateBookingData, nextStep, prevStep}) {
    const [workingHours, setWorkingHours] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedDate, setSelectedDate] = useState(null);
    const [selectedTime, setSelectedTime] = useState(null);
    const [availableDates, setAvailableDates] = useState([]);
    const [availableTimes, setAvailableTimes] = useState([]);
    const datesContainerRef = useRef(null);

    useEffect(() => {
        fetchWorkingHours();
    }, []);

    useEffect(() => {
        if (workingHours.length > 0) {
            generateAvailableDates();
        }
    }, [workingHours]);

    useEffect(() => {
        if (selectedDate) {
            generateAvailableTimes();
        }
    }, [selectedDate]);

    const fetchWorkingHours = async () => {
        try {
            const response = await fetch('/api/workingHours');
            const data = await response.json();
            setWorkingHours(data);
        } catch (error) {
            console.error('Error fetching working hours:', error);
        } finally {
            setLoading(false);
        }
    };

    const generateAvailableDates = () => {
        const dates = [];
        const today = new Date();

        for (let i = 1; i <= 60; i++) {
            const date = new Date();
            date.setDate(today.getDate() + i);

            const dayName = date.toLocaleDateString('en-US', {weekday: 'long'}).toLowerCase();
            const daySchedule = workingHours.find(wh => wh.day === dayName);

            if (daySchedule && !daySchedule.is_closed) {
                dates.push({
                    date: new Date(date),
                    dayName: dayName,
                    displayDate: date.toLocaleDateString('en-US', {
                        weekday: 'short',
                        month: 'short',
                        day: 'numeric'
                    }),
                    fullDate: date.toISOString().split('T')[0],
                    dayNumber: date.getDate(),
                    monthShort: date.toLocaleDateString('en-US', {month: 'short'}),
                    weekdayShort: date.toLocaleDateString('en-US', {weekday: 'short'})
                });
            }
        }

        setAvailableDates(dates);
        if (dates.length > 0 && !selectedDate) {
            setSelectedDate(dates[0]);
        }
    };

    const generateAvailableTimes = () => {
        if (!selectedDate) return;

        const daySchedule = workingHours.find(wh => wh.day === selectedDate.dayName);
        if (!daySchedule || daySchedule.is_closed || !daySchedule.open_time || !daySchedule.close_time) {
            setAvailableTimes([]);
            return;
        }

        const times = [];
        const [openHour, openMinute] = daySchedule.open_time.split(':').map(Number);
        const [closeHour, closeMinute] = daySchedule.close_time.split(':').map(Number);

        const openTime = new Date(selectedDate.date);
        openTime.setHours(openHour, openMinute, 0, 0);

        const closeTime = new Date(selectedDate.date);
        closeTime.setHours(closeHour, closeMinute, 0, 0);

        let currentTime = new Date(openTime);
        const slotDuration = selectedService?.duration || 30;

        while (currentTime < closeTime) {
            const endTime = new Date(currentTime);
            endTime.setMinutes(endTime.getMinutes() + slotDuration);

            // Only add slot if it fits before closing
            if (endTime <= closeTime) {
                const timeString = currentTime.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });

                times.push({
                    time: timeString,
                    value: currentTime.toTimeString().split(' ')[0],
                    hour: currentTime.getHours(),
                    minute: currentTime.getMinutes()
                });
            }

            currentTime.setMinutes(currentTime.getMinutes() + slotDuration);
        }

        setAvailableTimes(times);
    };

    const handleDateSelect = (date) => {
        setSelectedDate(date);
        setSelectedTime(null);
    };

    const handleTimeSelect = (time) => {
        setSelectedTime(time);
    };

    const handleNext = () => {
        if (!selectedDate || !selectedTime) {
            alert('Please select both date and time');
            return;
        }

        updateBookingData('dateTime', {
            date: selectedDate.fullDate,
            time: selectedTime.value,
            displayDate: selectedDate.displayDate,
            displayTime: selectedTime.time
        });

        nextStep();
    };

    // Scroll to selected date
    useEffect(() => {
        if (selectedDate && datesContainerRef.current) {
            const selectedElement = datesContainerRef.current.querySelector(`[data-date="${selectedDate.fullDate}"]`);
            if (selectedElement) {
                selectedElement.scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center',
                    block: 'nearest'
                });
            }
        }
    }, [selectedDate]);

    if (loading) {
        return (
            <div className="text-center py-5">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
                <p className="mt-3">Loading available times...</p>
            </div>
        );
    }

    return (
        <div>
            <h2 className="text-center text-primary mb-4">Select Date & Time</h2>
            <p className="text-center text-muted mb-4">
                {selectedService && `Service: ${selectedService.name} (${selectedService.duration} min)`}
                {selectedBarber && ` • Barber: ${selectedBarber.name}`}
            </p>

            {/* Date Selection - Horizontal Scroll */}
            <div className="mb-5">
                <h5 className="text-primary mb-3">Select Date</h5>

                <div
                    ref={datesContainerRef}
                    className="d-flex overflow-auto pb-3 b"
                    style={{
                        scrollbarWidth: 'thin',
                        scrollbarColor: '#120c3ae4 #dee2e6',
                    }}
                >
                    <div className="d-flex flex-nowrap">
                        {availableDates.map((date) => (
                            <div
                                key={date.fullDate}
                                data-date={date.fullDate}
                                className="me-3 flex-shrink-0"
                                style={{width: '100px'}}
                            >
                                <div
                                    className={`date-card p-3 text-center ${
                                        selectedDate?.fullDate === date.fullDate
                                            ? 'bg-primary text-white'
                                            : 'bg-secondary text-white'
                                    }`}
                                    onClick={() => handleDateSelect(date)}
                                    style={{
                                        cursor: 'pointer',
                                        transition: 'all 0.3s ease',
                                        border: selectedDate?.fullDate === date.fullDate
                                            ? '3px solid white'
                                            : '2px solid rgba(255,255,255,0.2)',
                                        minHeight: '110px',
                                        borderRadius: "8px"
                                    }}
                                >
                                    <div className="fw-bold display-6">
                                        {date.dayNumber}
                                    </div>
                                    <div className="small text-uppercase">
                                        {date.weekdayShort}
                                    </div>
                                    <div className={`small ${
                                        selectedDate?.fullDate === date.fullDate
                                            ? 'text-white'
                                            : 'text-primary'
                                    }`}>
                                        {date.monthShort}
                                    </div>

                                    {selectedDate?.fullDate === date.fullDate && (
                                        <div className="position-absolute top-0 end-0 m-2">
                                            <i className="fas fa-check-circle text-white"></i>
                                        </div>
                                    )}
                                </div>
                            </div>
                        ))}
                    </div>
                </div>

            </div>

            <div className="mb-5">
                <h5 className="text-primary mb-3">
                    Select Time {selectedDate && `for ${selectedDate.displayDate}`}
                </h5>

                {selectedDate ? (
                    availableTimes.length > 0 ? (
                        <div className="row g-2" >
                            {availableTimes.map((time, index) => (
                                <div key={index} className="col-4 col-md-3">
                                    <div
                                        className={`time-slot p-3 text-center ${
                                            selectedTime?.value === time.value
                                                ? 'bg-primary text-white'
                                                : 'bg-secondary text-white'
                                        }`}
                                        onClick={() => handleTimeSelect(time)}
                                        style={{
                                            cursor: 'pointer',
                                            transition: 'all 0.3s ease',
                                            border: selectedTime?.value === time.value
                                                ? '3px solid white'
                                                : '2px solid rgba(255,255,255,0.2)',
                                            borderRadius: "8px"
                                        }}
                                    >
                                        <div className="fw-bold">{time.time}</div>
                                        {selectedTime?.value === time.value && (
                                            <i className="fas fa-check mt-1"></i>
                                        )}
                                    </div>
                                </div>
                            ))}
                        </div>
                    ) : (
                        <div className="col-12">
                            <div className="alert alert-warning">
                                <i className="fas fa-exclamation-triangle me-2"></i>
                                No available time slots for this date. The shop might be closed.
                            </div>
                        </div>
                    )
                ) : (
                    <div className="alert alert-info">
                        <i className="fas fa-info-circle me-2"></i>
                        Please select a date first to see available time slots.
                    </div>
                )}
            </div>

            {/* Navigation Buttons */}
            <div className="d-flex justify-content-between mt-5">
                <button
                    className="btn btn-outline-primary px-4 py-2"
                    onClick={prevStep}
                    style={{borderRadius: "10px"}}
                >
                    <i className="fas fa-arrow-left me-2"></i>
                    Back to Barber
                </button>

                <button
                    className="btn btn-primary px-4 py-2"
                    onClick={handleNext}
                    disabled={!selectedDate || !selectedTime}
                    style={{
                        opacity: (selectedDate && selectedTime) ? 1 : 0.5,
                        cursor: (selectedDate && selectedTime) ? 'pointer' : 'not-allowed',
                        borderRadius: "10px"
                    }}
                >
                    Next: Your Information
                    <i className="fas fa-arrow-right ms-2"></i>
                </button>
            </div>

            <style jsx>{`
                .date-card:hover, .time-slot:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                }

                .overflow-auto::-webkit-scrollbar {
                    height: 6px;
                }

                .overflow-auto::-webkit-scrollbar-track {
                    background: #dee2e6;
                    border-radius: 6px;
                }

                .overflow-auto::-webkit-scrollbar-thumb {
                    background: #140b4e;
                    border-radius: 6px;
                }

                .overflow-auto::-webkit-scrollbar-thumb:hover {
                    background: #140b4e;
                }
            `}</style>
        </div>
    );
}
