export default function AboutPage(){
    return (
        <div>
            {/* About Start */}
            <div className="container-xxl py-5">
                <div className="container">
                    <div className="row g-5">
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div className="d-flex flex-column">
                                <img className="img-fluid w-75 align-self-end" src="/assets/img/about.jpg" alt=""/>
                                <div className="w-50 bg-secondary p-5" style={{marginTop: "-25%"}}>
                                    <h1 className="text-uppercase text-primary mb-3">15+ Years</h1>
                                    <h2 className="text-uppercase mb-0">Experience</h2>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <p className="d-inline-block bg-secondary text-primary py-1 px-4">About Us</p>
                            <h1 className="text-uppercase mb-4">More Than Just A Haircut. Learn More About Us!</h1>
                            <p>At our barbershop, we believe a haircut should feel as good as it looks. Since 2010,
                                we’ve focused on delivering quality grooming with a mix of modern style and classic techniques.
                                Every cut, trim, and shave is done with care and precision.
                            </p>
                            <p className="mb-4">Our barbers are committed to helping you look your best,
                                a clean shave or a full style refresh. With more than 1,000 satisfied clients,
                                we’re proud to be a trusted spot for men’s grooming in our community.
                            </p>
                            <div className="row g-4">
                                <div className="col-md-6">
                                    <h3 className="text-uppercase mb-3">Since 2010</h3>
                                    <p className="mb-0"> For more than a decade, we’ve provided reliable,
                                        professional grooming services with a commitment to quality and consistency.
                                    </p>
                                </div>
                                <div className="col-md-6">
                                    <h3 className="text-uppercase mb-3">1000+ clients</h3>
                                    <p className="mb-0">Our loyal clients are at the heart of what we do.
                                        Their trust and support inspire us to deliver our best every single day.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* About End */}
        </div>
    );
}
