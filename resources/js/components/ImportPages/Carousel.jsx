export default function Carousel(){
    return (
       <div>
           {/* Carousel Start */}
           <div className="container-fluid p-0 mb-5">
               <div id="header-carousel" className="carousel slide" data-bs-ride="carousel">
                   <div className="carousel-inner">
                       {/* Slide 1 */}
                       <div className="carousel-item active">
                           <img className="w-100" src="/assets/img/carousel-1.jpg" alt="Slide 1" />
                           <div className="carousel-caption d-flex align-items-center justify-content-center text-start">
                               <div className="mx-sm-5 px-5" style={{ maxWidth: "900px" }}>
                                   <h1 className="display-2 text-white text-uppercase mb-4 animated slideInDown">
                                       We Will Keep You An Awesome Look
                                   </h1>
                                   <h4 className="text-white text-uppercase mb-4 animated slideInDown">
                                       <i className="fa fa-map-marker-alt text-primary me-3"></i>Genden Street, Choijin Lam, UB
                                   </h4>
                                   <h4 className="text-white text-uppercase mb-4 animated slideInDown">
                                       <i className="fa fa-phone-alt text-primary me-3"></i>+976 9988 7766
                                   </h4>
                               </div>
                           </div>
                       </div>
                       {/* Slide 2 */}
                       <div className="carousel-item">
                           <img className="w-100" src="/assets/img/carousel-2.jpg" alt="Slide 2" />
                           <div className="carousel-caption d-flex align-items-center justify-content-center text-start">
                               <div className="mx-sm-5 px-5" style={{ maxWidth: "900px" }}>
                                   <h1 className="display-2 text-white text-uppercase mb-4 animated slideInDown">
                                       Luxury Haircut at Affordable Price
                                   </h1>
                                   <h4 className="text-white text-uppercase mb-4 animated slideInDown">
                                       <i className="fa fa-map-marker-alt text-primary me-3"></i>Genden Street, Choijin Lam, UB
                                   </h4>
                                   <h4 className="text-white text-uppercase mb-4 animated slideInDown">
                                       <i className="fa fa-phone-alt text-primary me-3"></i>+976 9988 7766
                                   </h4>
                               </div>
                           </div>
                       </div>
                   </div>

                   {/* Carousel Controls */}
                   <button
                       className="carousel-control-prev"
                       type="button"
                       data-bs-target="#header-carousel"
                       data-bs-slide="prev"
                   >
                       <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span className="visually-hidden">Previous</span>
                   </button>
                   <button
                       className="carousel-control-next"
                       type="button"
                       data-bs-target="#header-carousel"
                       data-bs-slide="next"
                   >
                       <span className="carousel-control-next-icon" aria-hidden="true"></span>
                       <span className="visually-hidden">Next</span>
                   </button>
               </div>
           </div>
           {/* Carousel End */}


       </div>
    );
}
