export default function ServiceSelection({ services, selectedService, setSelectedService, nextStep }) {

    const handleServiceSelect = (service) => {
        setSelectedService(service);
        nextStep();
    };
    return (
        <div>
            <h2 className="text-center text-primary mb-4">Choose Your Service</h2>
            <p className="text-center text-muted mb-4">Select one service to continue</p>

            <div className="row g-4">
                {services.map((service) => (
                    <div key={service.id} className="col-md-6">
                        <div
                            className={`service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0 ${
                                selectedService?.id === service.id ? 'selected-service' : ''
                            }`}
                            onClick={() => handleServiceSelect(service)}
                            style={{
                                cursor: 'pointer',
                                transition: 'all 0.3s ease',
                                border: selectedService?.id === service.id ? '3px solid white' : '2px solid gray',
                                borderRadius: "12px"
                            }}
                        >
                            <div className="bg-dark d-flex align-items-center justify-content-center"
                                 style={{width: "70px", height: "70px"}}>
                                {service.image ? (
                                    <img className="img-fluid" src={service.image} alt={service.name}/>
                                ) : (
                                    <i className="fas fa-scissors text-white" style={{fontSize: '24px'}}></i>
                                )}
                            </div>

                            <div className="ps-4">
                                <h5 className="text-uppercase mb-2">{service.name}</h5>
                                <p className="mb-3" style={{fontSize: '0.9rem'}}>{service.description}</p>

                                <div className="d-flex justify-content-between align-items-center">
                                    <span className="text-uppercase text-primary">${service.price}</span>
                                    <span className="">
                                        <i className="fas fa-clock me-1"></i>
                                        {service.duration} Min
                                    </span>
                                </div>
                            </div>

                            {/* Check / Plus Icon */}
                            <div className="position-absolute" style={{top: '15px', right: '15px'}}>
                                <div className={`rounded-circle ${
                                    selectedService?.id === service.id ? 'bg-primary' : 'bg-dark'
                                } d-flex align-items-center justify-content-center`}
                                     style={{width: '30px', height: '30px'}}>
                                    <i className={`fas ${
                                        selectedService?.id === service.id ? 'fa-check' : 'fa-plus'
                                    } text-white`}></i>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
            </div>

            <style jsx>{`
                .service-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                }
                .selected-service {
                    border: 3px solid #fff !important;
                    box-shadow: 0 0 15px rgba(255,255,255,0.4);
                }
            `}</style>
        </div>
    );
}
