import { useState, useEffect } from 'react';
import ServiceSelection from "../components/booking-steps/ServiceSelection.jsx";
import BarberSelection from "../components/booking-steps/BarberSelection.jsx";
import DateTimeSelection from "../components/booking-steps/DateTimeSelection.jsx";
import CustomerInfo from '../components/booking-steps/CustomerInfo';
import Confirmation from "../components/booking-steps/Confirmation.jsx";
export default function AppointmentBooking() {
    const [currentStep, setCurrentStep] = useState(1);
    const [services, setServices] = useState([]);
    const [barbers, setBarbers] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedService, setSelectedService] = useState(null);
    const [selectedBarber, setSelectedBarber] = useState(null);
    const [bookingData, setBookingData] = useState({});

    useEffect(() => {
        fetchServices();
        fetchBarbers();
    }, []);

    const fetchServices = async () => {
        try {
            const response = await fetch('/api/services');
            const data = await response.json();
            setServices(data);
        } catch (error) {
            console.error('Error fetching services:', error);
        } finally {
            setLoading(false);
        }
    };

    const fetchBarbers = async () => {
        try {
            const response = await fetch('/api/barbers');
            const data = await response.json();
            setBarbers(data);
        } catch (error) {
            console.error('Error fetching barbers:', error);
        } finally {
            setLoading(false);
        }
    };

    const steps = [
        { number: 1, title: 'Service' },
        { number: 2, title: 'Barber' },
        { number: 3, title: 'Date & Time' },
        { number: 4, title: 'Your Info' },
        { number: 5, title: 'Confirm' }
    ];

    const nextStep = () => setCurrentStep(prev => prev + 1);
    const prevStep = () => setCurrentStep(prev => prev - 1);

    const updateBookingData = (key, value) => {
        setBookingData(prev => ({
            ...prev,
            [key]: value
        }));
    };
    const submitBooking = async (bookingData) => {
        // This function can be called from Confirmation component
        console.log('Booking submitted:', bookingData);
        // You could add additional logic here if needed
    };


    return (
        <div className="container-xxl py-5">
            <div className="container">
                <div className="row mb-5">
                    <div className="col-12">
                        <div className="d-flex justify-content-between align-items-center">
                            {steps.map((step, index) => (
                                <div key={step.number} className="text-center">
                                    <div className={`
                                        rounded-circle d-inline-flex align-items-center justify-content-center
                                        ${currentStep >= step.number ? 'bg-primary text-white' : 'bg-secondary text-gray-300'}
                                        ${index < steps.length - 1 ? 'me-3' : ''}
                                    `}
                                         style={{width: '50px', height: '50px', fontSize: '18px', fontWeight: 'bold'}}>
                                        {step.number}
                                    </div>
                                    <span className="d-flex justify-content-start mt-1" >{step.title}</span>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>

                {/* Card Wrapper */}
                <div className="row justify-content-center">
                    <div className="col-lg-8">
                        <div className="card shadow-lg bg-secondary border-0">
                            <div className="card-body p-5">

                                {currentStep === 1 && (
                                    <ServiceSelection
                                        services={services}
                                        selectedService={selectedService}
                                        setSelectedService={setSelectedService}
                                        nextStep={nextStep}
                                    />
                                )}
                                {currentStep === 2 &&(
                                    <BarberSelection
                                       barbers={barbers}
                                       selectedBarber={selectedBarber}
                                       setSelectedBarber={setSelectedBarber}
                                       nextStep={nextStep}
                                       prevStep={prevStep}
                                    />
                                )}
                                {currentStep === 3 && (
                                     <DateTimeSelection
                                         bookingData={bookingData}
                                         selectedService={selectedService}
                                         selectedBarber={selectedBarber}
                                         updateBookingData={updateBookingData}
                                         nextStep={nextStep}
                                         prevStep={prevStep}
                                     />
                                )}
                                {currentStep === 4 && (
                                    <CustomerInfo
                                        bookingData={bookingData}
                                        updateBookingData={updateBookingData}
                                        nextStep={nextStep}
                                        prevStep={prevStep}
                                    />
                                )}

                                {currentStep === 5 && (
                                    <Confirmation
                                        bookingData={bookingData}
                                        selectedService={selectedService}
                                        selectedBarber={selectedBarber}
                                        prevStep={prevStep}
                                        submitBooking={submitBooking}
                                    />
                                )}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    );
}
