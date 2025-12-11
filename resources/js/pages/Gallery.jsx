import { useState, useEffect } from 'react';

export default function Gallery() {
    const [galleries, setGalleries] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showAfter, setShowAfter] = useState({
        1: false,
        2: false,
        3: false
    });
    useEffect(() =>{
        fetchGalleries();
    },[]);

    const fetchGalleries = async() =>{
          try{
              const response = await fetch('/api/galleries');
              const data = await response.json();
              setGalleries(data);
          }catch (error) {
              console.error('Error:', error);
          } finally {
              setLoading(false);
          }
    };

    return (
        <div>
            {/* Page Header Start */}
            <div className="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
                <div className="container text-center py-5">
                    <h1 className="display-3 text-white text-uppercase mb-3 animated slideInDown">Gallery</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol className="breadcrumb justify-content-center text-uppercase mb-0">
                            <li className="breadcrumb-item"><a className="text-white" href="#">Home</a></li>
                            <li className="breadcrumb-item"><a className="text-white" href="#">Pages</a></li>
                            <li className="breadcrumb-item text-primary active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {/* Page Header End */}

            <div className="container-xxl py-4">
                <div className="container">
                    <div className="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style={{ maxWidth: "600px" }}>
                        <p className="d-inline-block bg-secondary text-primary py-1 px-4">Our Gallery</p>
                        <h1 className="text-uppercase">Before After Images</h1>
                    </div>

                    <div className="row g-5">
                        {galleries.map((gallery, index) => (
                            <div key={gallery.id} className="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div className="bg-secondary text-center p-4 mb-3">
                                    <h5 className="text-uppercase text-primary">{gallery.title}</h5>
                                </div>

                                <div className="position-relative overflow-hidden rounded" style={{ height: "400px" }}>

                                    <div
                                        className={`carousel-item ${!showAfter[gallery.id] ? 'active' : ''}`}
                                        style={{ display: !showAfter[gallery.id] ? 'block' : 'none' }}
                                    >
                                        <img
                                            className="img-fluid w-100 h-100"
                                            src={gallery.before_image}
                                            alt={`${gallery.title} Before`}
                                        />
                                    </div>

                                    {/* After Image */}
                                    <div
                                        className={`carousel-item ${showAfter[gallery.id] ? 'active' : ''}`}
                                        style={{ display: showAfter[gallery.id] ? 'block' : 'none' }}
                                    >
                                        <img
                                            className="img-fluid w-100 h-100"
                                            src={gallery.after_image}
                                            alt={`${gallery.title} After`}
                                        />
                                    </div>

                                    {/* Carousel Controls */}
                                    <button
                                        className="carousel-control-prev"
                                        type="button"
                                        onClick={() => setShowAfter(prev => ({...prev, [gallery.id]: false}))}
                                        disabled={!showAfter[gallery.id]}
                                        style={{
                                            opacity: showAfter[gallery.id] ? 1 : 0.3,
                                            cursor: showAfter[gallery.id] ? 'pointer' : 'not-allowed'
                                        }}
                                    >
                                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span className="visually-hidden">Previous (Before)</span>
                                    </button>

                                    <button
                                        className="carousel-control-next"
                                        type="button"
                                        onClick={() => setShowAfter(prev => ({...prev, [gallery.id]: true}))}
                                        disabled={showAfter[gallery.id]}
                                        style={{
                                            opacity: !showAfter[gallery.id] ? 1 : 0.3,
                                            cursor: !showAfter[gallery.id] ? 'pointer' : 'not-allowed'
                                        }}
                                    >
                                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span className="visually-hidden">Next (After)</span>
                                    </button>

                                    {/* Current State Indicator */}
                                    <div className="position-absolute bottom-0 start-0 w-100 text-center p-2"
                                         style={{ background: 'rgba(0,0,0,0.7)' }}>
                                        <span className="text-white fw-bold">
                                            {showAfter[gallery.id] ? (
                                                <>
                                                    <i className="fas fa-check-circle me-2"></i>
                                                    AFTER RESULT
                                                </>
                                            ) : (
                                                <>
                                                    <i className="fas fa-cut me-2"></i>
                                                    BEFORE START
                                                </>
                                            )}
                                        </span>
                                    </div>
                                </div>

                                {/* Indicator Dots */}
                                <div className="d-flex justify-content-center mt-3">
                                    <div className="d-flex">
                                        <button
                                            onClick={() => setShowAfter(prev => ({...prev, [gallery.id]: false}))}
                                            className={`mx-1 ${!showAfter[gallery.id] ? 'text-primary' : 'text-secondary'}`}
                                            style={{
                                                border: 'none',
                                                background: 'none',
                                                fontSize: '24px'
                                            }}
                                        >
                                            •
                                        </button>
                                        <button
                                            onClick={() => setShowAfter(prev => ({...prev, [gallery.id]: true}))}
                                            className={`mx-1 ${showAfter[gallery.id] ? 'text-primary' : 'text-secondary'}`}
                                            style={{
                                                border: 'none',
                                                background: 'none',
                                                fontSize: '24px'
                                            }}
                                        >
                                            •
                                        </button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
}
