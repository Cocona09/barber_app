export default function Contact(){
    return(
      <div>
          {/* Page Header Start */}
          <div className="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
              <div className="container text-center py-5">
                  <h1 className="display-3 text-white text-uppercase mb-3 animated slideInDown">Contact</h1>
                  <nav aria-label="breadcrumb animated slideInDown">
                      <ol className="breadcrumb justify-content-center text-uppercase mb-0">
                          <li className="breadcrumb-item"><a className="text-white" href="#">Home</a></li>
                          <li className="breadcrumb-item"><a className="text-white" href="#">Pages</a></li>
                          <li className="breadcrumb-item text-primary active" aria-current="page">Contact</li>
                      </ol>
                  </nav>
              </div>
          </div>
          {/* Page Header End */}

          {/* Contact Start */}
          <div className="container-xxl py-5">
              <div className="container">
                  <div className="row g-0">
                      <div className="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                          <div className="bg-secondary p-5">
                              <p className="d-inline-block bg-dark text-primary py-1 px-4">Contact Us</p>
                              <h1 className="text-uppercase mb-4">Have Any Query? Please Contact Us!</h1>

                              <form>
                                  <div className="row g-3">

                                      {/* Name */}
                                      <div className="col-md-6">
                                          <div className="form-floating">
                                              <input
                                                  type="text"
                                                  className="form-control bg-transparent"
                                                  id="name"
                                                  placeholder="Your Name"
                                              />
                                              <label htmlFor="name">Your Name</label>
                                          </div>
                                      </div>

                                      {/* Email */}
                                      <div className="col-md-6">
                                          <div className="form-floating">
                                              <input
                                                  type="email"
                                                  className="form-control bg-transparent"
                                                  id="email"
                                                  placeholder="Your Email"
                                              />
                                              <label htmlFor="email">Your Email</label>
                                          </div>
                                      </div>

                                      {/* Subject */}
                                      <div className="col-12">
                                          <div className="form-floating">
                                              <input
                                                  type="text"
                                                  className="form-control bg-transparent"
                                                  id="subject"
                                                  placeholder="Subject"
                                              />
                                              <label htmlFor="subject">Subject</label>
                                          </div>
                                      </div>

                                      {/* Message */}
                                      <div className="col-12">
                                          <div className="form-floating">
                  <textarea
                      className="form-control bg-transparent"
                      placeholder="Leave a message here"
                      id="message"
                      style={{ height: "100px" }}
                  ></textarea>
                                              <label htmlFor="message">Message</label>
                                          </div>
                                      </div>

                                      {/* Button */}
                                      <div className="col-12">
                                          <button className="btn btn-primary w-100 py-3" type="submit">
                                              Send Message
                                          </button>
                                      </div>

                                  </div>
                              </form>
                          </div>
                      </div>

                      {/* Google Map */}
                      <div className="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                          <div className="h-100" style={{minHeight: "400px"}}>
                              <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4497.382602879309!2d106.91926500667739!3d47.91394740894229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d96924883462f69%3A0x857984f400fc4f7a!2sChoijin%20Lama%20Temple%20Museum!5e0!3m2!1sen!2smn!4v1763566333925!5m2!1sen!2smn"
                                  width="100%" height="100%" style={{border: 0}} allowFullScreen="" loading="lazy"
                                  referrerPolicy="no-referrer-when-downgrade">
                              </iframe>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
          {/* Contact End */}

      </div>
    );
}
