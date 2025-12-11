// components/booking-steps/CustomerInfo.jsx
import { useState, useEffect } from 'react';

export default function CustomerInfo({
                                         bookingData,
                                         updateBookingData,
                                         nextStep,
                                         prevStep
                                     }) {
    const [formData, setFormData] = useState({
        name: '',
        phone: '',
        email: '',
        notes: ''
    });
    const [errors, setErrors] = useState({});

    // Load existing data if any
    useEffect(() => {
        if (bookingData.customerInfo) {
            setFormData(bookingData.customerInfo);
        }
    }, [bookingData.customerInfo]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));

        // Clear error when user starts typing
        if (errors[name]) {
            setErrors(prev => ({
                ...prev,
                [name]: ''
            }));
        }
    };

    const validateForm = () => {
        const newErrors = {};

        if (!formData.name.trim()) {
            newErrors.name = 'Name is required';
        }

        if (!formData.phone.trim()) {
            newErrors.phone = 'Phone number is required';
        } else if (!/^\d{8,15}$/.test(formData.phone.replace(/\D/g, ''))) {
            newErrors.phone = 'Enter a valid phone number';
        }

        if (!formData.email.trim()) {
            newErrors.email = 'Email is required';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email)) {
            newErrors.email = 'Enter a valid email address';
        }

        return newErrors;
    };

    const handleNext = () => {
        const formErrors = validateForm();

        if (Object.keys(formErrors).length > 0) {
            setErrors(formErrors);
            return;
        }

        // Save customer info
        updateBookingData('customerInfo', formData);
        nextStep();
    };

    return (
        <div>
            <h2 className="text-center text-primary mb-4">Your Information</h2>
            <p className="text-center text-muted mb-4">
                Please fill in your details to complete the booking
            </p>

            <div className="row g-4">
                <div className="col-md-12">
                    <div className="form-group">
                        <label className="form-label text-white">
                            <i className="fas fa-user me-2"></i>
                            Full Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleChange}
                            className={`form-control bg-secondary text-white border-2 ${errors.name ? 'is-invalid' : ''}`}
                            placeholder="Enter your full name"
                            style={{
                                padding: '12px',
                                borderRadius: '8px'
                            }}
                        />
                        {errors.name && (
                            <div className="invalid-feedback d-block">
                                <i className="fas fa-exclamation-circle me-1"></i>
                                {errors.name}
                            </div>
                        )}
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-group">
                        <label className="form-label text-white">
                            <i className="fas fa-phone me-2"></i>
                            Phone Number
                        </label>
                        <input
                            type="tel"
                            name="phone"
                            value={formData.phone}
                            onChange={handleChange}
                            className={`form-control bg-secondary text-white border-2 ${errors.phone ? 'is-invalid' : ''}`}
                            placeholder="enter your phone number"
                            style={{
                                padding: '12px',
                                borderRadius: '8px'
                            }}
                        />
                        {errors.phone && (
                            <div className="invalid-feedback d-block">
                                <i className="fas fa-exclamation-circle me-1"></i>
                                {errors.phone}
                            </div>
                        )}
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-group">
                        <label className="form-label text-white">
                            <i className="fas fa-envelope me-2"></i>
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            value={formData.email}
                            onChange={handleChange}
                            className={`form-control bg-dark text-white border-2 ${errors.email ? 'is-invalid' : ''}`}
                            placeholder="enter your email"
                            style={{
                                padding: '12px',
                                borderRadius: '8px'
                            }}
                        />
                        {errors.email && (
                            <div className="invalid-feedback d-block">
                                <i className="fas fa-exclamation-circle me-1"></i>
                                {errors.email}
                            </div>
                        )}
                    </div>
                </div>

                <div className="col-md-12">
                    <div className="form-group">
                        <label className="form-label text-white">
                            <i className="fas fa-sticky-note me-2"></i>
                            Additional Notes (Optional)
                        </label>
                        <textarea
                            name="notes"
                            value={formData.notes}
                            onChange={handleChange}
                            className="form-control bg-dark text-white border-2 mb-2"
                            placeholder="Any special requests or notes for the barber..."
                            rows="4"
                            style={{
                                padding: '12px',
                                borderRadius: '8px',
                                resize: 'none'
                            }}
                        />
                        <small>
                            "Please bring my hairline forward", "I want a skin fade", etc.
                        </small>
                    </div>
                </div>
            </div>

            {/* Navigation Buttons */}
            <div className="d-flex justify-content-between mt-5">
                <button
                    className="btn btn-outline-primary px-4 py-2"
                    onClick={prevStep}
                    style={{borderRadius: "10px"}}
                >
                    <i className="fas fa-arrow-left me-2"></i>
                    Back to Date & Time
                </button>

                <button
                    className="btn btn-primary px-4 py-2"
                    onClick={handleNext}
                    style={{borderRadius: "10px"}}
                >
                    Next: Confirm Booking
                    <i className="fas fa-arrow-right ms-2"></i>
                </button>
            </div>

            <style jsx>{`
                .form-control:focus {
                    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
                    border-color: #0d6efd;
                }

                .form-control.bg-dark {
                    background-color: #1a1d20 !important;
                }

                .form-control::placeholder {
                    color: #6c757d;
                }

                .invalid-feedback {
                    color: #dc3545;
                    font-size: 0.875em;
                    margin-top: 0.25rem;
                }
            `}</style>
        </div>
    );
}
