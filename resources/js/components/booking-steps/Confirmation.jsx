import { useState } from 'react';

export default function Confirmation({ bookingData, selectedService, selectedBarber, prevStep, submitBooking }) {
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [bookingSuccess, setBookingSuccess] = useState(false);
    const [bookingId, setBookingId] = useState(null);
    const [errorMessage, setErrorMessage] = useState('');

    const handleConfirmBooking = async () => {
        if (!bookingData.customerInfo || !selectedService || !selectedBarber || !bookingData.dateTime) {
            setErrorMessage('Please complete all booking steps');
            return;
        }

        setIsSubmitting(true);
        setErrorMessage('');

        try {
            const bookingPayload = {
                customer_name: bookingData.customerInfo.name,
                customer_phone: bookingData.customerInfo.phone,
                customer_email: bookingData.customerInfo.email,
                service_id: selectedService.id,
                barber_id: selectedBarber.id,
                date: bookingData.dateTime.date,
                time: bookingData.dateTime.time,
                notes: bookingData.customerInfo.notes || '',
                status: 'pending'
            };

            const response = await fetch('/api/bookings', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(bookingPayload)
            });

            // Get response as text first
            const responseText = await response.text();
            console.log('RAW RESPONSE:', responseText.substring(0, 200));

            let result;
            try {
                result = JSON.parse(responseText);
            } catch (e) {
                console.error('Response is not JSON:', responseText.substring(0, 500));
                throw new Error('Server returned invalid response');
            }

            // Now check the parsed result
            if (response.ok && result.success) {
                setBookingId(result.id);
                setBookingSuccess(true);

                if (submitBooking) {
                    submitBooking(result);
                }
            } else {
                throw new Error(result.message || `Booking failed (Status: ${response.status})`);
            }
        } catch (error) {
            console.error('Booking error:', error);
            setErrorMessage(error.message || 'Failed to create booking. Please try again.');
        } finally {
            setIsSubmitting(false);
        }
    };

    if (bookingSuccess) {
        return (
            <div className="text-center py-5">
                <div className="mb-4">
                    <div className="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center"
                         style={{ width: '80px', height: '80px' }}>
                        <i className="fas fa-check text-white" style={{ fontSize: '40px' }}></i>
                    </div>
                </div>

                <h3 className="text-primary mb-3">Booking Confirmed!</h3>
                <p className="text-muted mb-4">
                    Your appointment has been successfully booked.
                </p>

                <div className="d-flex justify-content-center gap-3 mt-4">
                    <button
                        className="btn btn-outline-primary px-4"
                        onClick={() => window.location.href = '/'}
                    >
                        <i className="fas fa-home me-2"></i>
                        Back to Home
                    </button>
                    <button
                        className="btn btn-primary px-4"
                        onClick={() => window.location.reload()}
                    >
                        <i className="fas fa-calendar-plus me-2"></i>
                        Book Another
                    </button>
                </div>
            </div>
        );
    }

    return (
        <div>
            <h2 className="text-center text-primary mb-3">Confirm Your Booking</h2>
            <p className="text-center text-muted mb-4">
                Review your appointment details before confirming
            </p>

            {errorMessage && (
                <div className="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i className="fas fa-exclamation-circle me-2"></i>
                    {errorMessage}
                    <button type="button" className="btn-close" onClick={() => setErrorMessage('')}></button>
                </div>
            )}

            <div className="bg-dark p-4 mb-4" style={{ borderRadius: "12px" }}>
                <h5 className="text-primary mb-4 border-bottom pb-3">
                    <i className="fas fa-calendar-check me-2"></i>
                    Appointment Summary
                </h5>

                <div className="row">
                    <div className="col-md-6 mb-4">
                        <div className="d-flex align-items-start">
                            <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style={{ width: '40px', height: '40px' }}>
                                <i className="fas fa-cut text-white"></i>
                            </div>
                            <div>
                                <h6 className="text-white mb-1">Service</h6>
                                <div className="text-primary fw-bold">{selectedService?.name}</div>
                                <div className="text-muted small">
                                    {selectedService?.duration} min • ${selectedService?.price}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-md-6 mb-4">
                        <div className="d-flex align-items-start">
                            <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style={{ width: '40px', height: '40px' }}>
                                <i className="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 className="text-white mb-1">Barber</h6>
                                <div className="text-primary fw-bold">{selectedBarber?.name}</div>
                                {selectedBarber?.specialty && (
                                    <div className="text-muted small">{selectedBarber.specialty}</div>
                                )}
                            </div>
                        </div>
                    </div>

                    <div className="col-md-6 mb-4">
                        <div className="d-flex align-items-start">
                            <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style={{ width: '40px', height: '40px' }}>
                                <i className="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h6 className="text-white mb-1">Date & Time</h6>
                                <div className="text-primary fw-bold">
                                    {bookingData.dateTime?.displayDate}
                                </div>
                                <div className="text-primary fw-bold">
                                    {bookingData.dateTime?.displayTime}
                                </div>
                                <div className="text-muted small">
                                    Duration: {selectedService?.duration || 30} min
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-md-6 mb-4">
                        <div className="d-flex align-items-start">
                            <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style={{ width: '40px', height: '40px' }}>
                                <i className="fas fa-user-circle text-white"></i>
                            </div>
                            <div>
                                <h6 className="text-white mb-1">Your Information</h6>
                                <div className="text-primary fw-bold">
                                    {bookingData.customerInfo?.name}
                                </div>
                                <div className="text-muted small">
                                    {bookingData.customerInfo?.phone}
                                </div>
                                <div className="text-muted small">
                                    {bookingData.customerInfo?.email}
                                </div>
                            </div>
                        </div>
                    </div>

                    {bookingData.customerInfo?.notes && (
                        <div className="col-12 mt-3">
                            <div className="d-flex align-items-start">
                                <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                     style={{ width: '40px', height: '40px' }}>
                                    <i className="fas fa-sticky-note text-white"></i>
                                </div>
                                <div className="w-100">
                                    <h6 className="text-white mb-2">Notes</h6>
                                    <div className="bg-secondary p-3 rounded">
                                        <p className="text-white mb-0">{bookingData.customerInfo.notes}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}
                </div>

                <div className="mt-4 pt-3 border-top">
                    <div className="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 className="text-white mb-0">Service Price</h6>
                            <small className="text-muted">Pay at the salon</small>
                        </div>
                        <div className="text-end">
                            <div className="text-primary fw-bold" style={{ fontSize: '1.5rem' }}>
                                ${selectedService?.price || 0}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="alert alert-warning bg-dark border-primary mb-4" style={{ borderRadius: "10px" }}>
                <div className="d-flex">
                    <i className="fas fa-exclamation-triangle text-primary me-3 mt-1"></i>
                    <div>
                        <strong className="text-primary">Important:</strong>
                        <ul className="mb-0 mt-2 text-white">
                            <li>Arrive 5-10 minutes before your appointment</li>
                            <li>Cancellations must be made at least 2 hours in advance</li>
                            <li>Payment is due at the time of service</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div className="d-flex justify-content-between">
                <button
                    className="btn btn-outline-primary px-4"
                    onClick={prevStep}
                    disabled={isSubmitting}
                    style={{ borderRadius: "10px" }}
                >
                    <i className="fas fa-arrow-left me-2"></i>
                    Back
                </button>

                <div className="d-flex gap-3">
                    <button
                        className="btn btn-outline-info px-4"
                        onClick={() => window.location.reload()}
                        disabled={isSubmitting}
                        style={{ borderRadius: "10px" }}
                    >
                        <i className="fas fa-times me-2"></i>
                        Cancel
                    </button>

                    <button
                        className="btn btn-primary px-4"
                        onClick={handleConfirmBooking}
                        disabled={isSubmitting}
                        style={{ minWidth: '180px', borderRadius: "10px" }}
                    >
                        {isSubmitting ? (
                            <>
                                <span className="spinner-border spinner-border-sm me-2"></span>
                                Processing...
                            </>
                        ) : (
                            <>
                                <i className="fas fa-check-circle me-2"></i>
                                Confirm Booking
                            </>
                        )}
                    </button>
                </div>
            </div>
        </div>
    );
}
