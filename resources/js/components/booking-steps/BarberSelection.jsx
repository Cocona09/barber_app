export default function BarberSelection({barbers, selectedBarber, setSelectedBarber, nextStep, prevStep}) {

    const handleBarberSelect = (barber) => {
        setSelectedBarber(barber);
        nextStep();
    };

    return (
        <div>
            <h2 className="text-center text-primary mb-4">Choose Your Barber</h2>
            <p className="text-center text-muted mb-4">Select your preferred barber</p>

            <div className="row g-4 justify-content-center">
                {barbers.slice(0,6).map((barber) => (
                    <div key={barber.id} className="col-md-4 col-sm-6">
                        <div
                            className={`barber-card text-center p-4 bg-secondary position-relative ${
                                selectedBarber?.id === barber.id ? "selected-barber" : ""
                            }`}
                            onClick={() => handleBarberSelect(barber)}
                            style={{
                                cursor: "pointer",
                                border: selectedBarber?.id === barber.id
                                    ? "3px solid white"
                                    : "2px solid gray",
                                borderRadius: "12px",
                                transition: "all 0.3s ease"
                            }}
                        >
                            <div
                                className="mx-auto mb-3 bg-dark d-flex align-items-center justify-content-center"
                                style={{
                                    width: "100px",
                                    height: "100px",
                                    borderRadius: "50%",
                                    overflow: "hidden"
                                }}
                            >
                                {barber.image ? (
                                    <img
                                        className="img-fluid"
                                        src={barber.image}
                                        alt={barber.name}
                                        style={{ width: "100%", height: "100%"}}
                                    />
                                ) : (
                                    <i className="fas fa-user text-white" style={{ fontSize: "40px" }} />
                                )}
                            </div>

                            <h5 className="text-uppercase text-white mb-2">
                                {barber.name}
                            </h5>

                            {barber.specialties && (
                                <p className="text-primary mb-0">{barber.specialties}</p>
                            )}
                        </div>
                    </div>
                ))}
            </div>

            <div className="d-flex justify-content-start mt-5">
                <button
                    className="btn btn-outline-primary px-4 py-2"
                    onClick={prevStep}
                >
                    <i className="fas fa-arrow-left me-2"></i>
                    Back to Services
                </button>
            </div>

            <style jsx>{`
                .barber-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
                }
                .selected-barber {
                    border: 3px solid #fff !important;
                    box-shadow: 0 0 15px rgba(255,255,255,0.4);
                }
            `}</style>
        </div>
    );
}
