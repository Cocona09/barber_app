import { useState, useEffect } from 'react';

export default function Service() {
    const [services, setServices] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchServices();
    }, []);

    const fetchServices = async () => {
        try {
            const response = await fetch('/api/services');
            const data = await response.json();
            setServices(data);
        } catch (error) {
            console.error('Error:', error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div>
            {/* Page Header */}
            <div className="container-fluid page-header py-5 mb-5">
                <div className="container text-center py-5">
                    <h1 className="display-3 text-white text-uppercase mb-3">Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol className="breadcrumb justify-content-center text-uppercase mb-0">
                            <li className="breadcrumb-item"><a className="text-white" href="#">Home</a></li>
                            <li className="breadcrumb-item"><a className="text-white" href="#">Pages</a></li>
                            <li className="breadcrumb-item text-primary active">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>

            {/* Services Section */}
            <div className="container-xxl py-5">
                <div className="container">
                    <div className="text-center mx-auto mb-5" style={{maxWidth: "600px"}}>
                        <p className="d-inline-block bg-secondary text-primary py-1 px-4">Services</p>
                        <h1 className="text-uppercase">What We Provide</h1>
                    </div>

                    <div className="row g-4">
                        {services.map((service, index) => (
                            <div key={service.id} className="col-lg-4 col-md-6">
                                <div className="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                                    <div className="bg-dark d-flex align-items-center justify-content-center"
                                         style={{width: "60px", height: "60px"}}>
                                        <img
                                            className="img-fluid"
                                            src={`${service.image}`}
                                            alt={service.name}
                                        />
                                    </div>
                                    <div className="ps-4">
                                        <h3 className="text-uppercase mb-3">{service.name}</h3>
                                        <p>{service.description}</p>
                                        <span className="text-uppercase text-primary">From ${service.price}</span>
                                        <br/><br/>
                                        <span className="text-uppercase text-primary">Duration {service.duration} Min</span>
                                    </div>
                                    <a className="btn btn-square" href="">
                                        <i className="fa fa-plus text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
}
