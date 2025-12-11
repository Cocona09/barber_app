import React from "react";

export default function Footer() {
    return (
        <>
            {/* Footer Start */}
            <div className="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
                <div className="container py-5">
                    <div className="row g-5">

                        {/* Get In Touch */}
                        <div className="col-lg-4 col-md-6">
                            <h4 className="text-uppercase mb-4">Get In Touch</h4>
                            <div className="d-flex align-items-center mb-2">
                                <div className="btn-square bg-dark flex-shrink-0 me-3">
                                    <span className="fa fa-map-marker-alt text-primary"></span>
                                </div>
                                <span>Genden Street, Choijin Lam, UB</span>
                            </div>
                            <div className="d-flex align-items-center mb-2">
                                <div className="btn-square bg-dark flex-shrink-0 me-3">
                                    <span className="fa fa-phone-alt text-primary"></span>
                                </div>
                                <span>+976 9988 7766</span>
                            </div>
                            <div className="d-flex align-items-center">
                                <div className="btn-square bg-dark flex-shrink-0 me-3">
                                    <span className="fa fa-envelope-open text-primary"></span>
                                </div>
                                <span>MiniBarber@gmail.com</span>
                            </div>
                        </div>

                        {/* Quick Links */}
                        <div className="col-lg-4 col-md-6">
                            <h4 className="text-uppercase mb-4">Quick Links</h4>
                            <a className="btn btn-link" href="/about">About Us</a>
                            <a className="btn btn-link" href="/contact">Contact Us</a>
                            <a className="btn btn-link" href="/service">Our Services</a>
                            <a className="btn btn-link" href="/">Terms & Condition</a>
                            <a className="btn btn-link" href="/">Support</a>
                        </div>

                        {/* Newsletter */}
                        <div className="col-lg-4 col-md-6">
                            <h4 className="text-uppercase mb-4">Newsletter</h4>
                            <div className="position-relative mb-4">
                                <input
                                    className="form-control border-0 w-100 py-3 ps-4 pe-5"
                                    type="text"
                                    placeholder="Your email"
                                />
                                <button
                                    type="button"
                                    className="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
                                >
                                    SignUp
                                </button>
                            </div>
                            <div className="d-flex pt-1 m-n1">
                                <a className="btn btn-lg-square btn-dark text-primary m-1" href="/">
                                    <i className="fab fa-twitter"></i>
                                </a>
                                <a className="btn btn-lg-square btn-dark text-primary m-1" href="/">
                                    <i className="fab fa-facebook-f"></i>
                                </a>
                                <a className="btn btn-lg-square btn-dark text-primary m-1" href="/">
                                    <i className="fab fa-youtube"></i>
                                </a>
                                <a className="btn btn-lg-square btn-dark text-primary m-1" href="/">
                                    <i className="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                {/* Copyright */}
                <div className="container">
                    <div className="copyright">
                        <div className="row">
                            <div className="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a className="border-bottom" href="/">MINI BARBER SHOP</a> @All Right Reserved.
                            </div>
                            <div className="col-md-6 text-center text-md-end">
                                Designed By <span>CodeX Company</span>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* Footer End */}

            {/* Back to Top */}
            <a href="#" className="btn btn-primary btn-lg-square back-to-top">
                <i className="bi bi-arrow-up"></i>
            </a>
        </>
    );
}
