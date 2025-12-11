import { NavLink } from "react-router-dom";

export default function Header() {
    return (
        <>
            {/* Navbar */}
            <nav className="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5">
                <NavLink to="/" className="navbar-brand ms-4 ms-lg-0">
                    <h1 className="mb-0 text-primary text-uppercase">
                        <i className="fa fa-cut me-3"></i>Barber Shop
                    </h1>
                </NavLink>

                <button
                    className="navbar-toggler me-4"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarCollapse">
                    <div className="navbar-nav ms-auto p-4 p-lg-0">
                        <NavLink to="/" className="nav-item nav-link">
                            Home
                        </NavLink>
                        <NavLink to="/about" className="nav-item nav-link">
                            About
                        </NavLink>
                        <NavLink to="/service" className="nav-item nav-link">
                            Service
                        </NavLink>

                        {/* Dropdown */}
                        <div className="nav-item dropdown">
                            <a
                                href="#"
                                className="nav-link dropdown-toggle"
                                id="pagesDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                Pages
                            </a>
                            <ul className="dropdown-menu" aria-labelledby="pagesDropdown" style={{backgroundColor: "rgba(206, 206, 214, 0.83)"}}  >
                                <li>
                                    <NavLink to="/price" className="dropdown-item">
                                        Pricing Plan
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink to="/barber" className="dropdown-item">
                                        Our Barber
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink to="/open" className="dropdown-item">
                                        Working Hours
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink to="/gallery" className="dropdown-item">
                                        Gallery
                                    </NavLink>
                                </li>
                            </ul>
                        </div>

                        <NavLink to="/contact" className="nav-item nav-link">
                            Contact
                        </NavLink>
                    </div>

                    <NavLink
                        to="/appointment"
                        className="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block"
                    >
                        Appointment <i className="fa fa-arrow-right ms-3"></i>
                    </NavLink>
                </div>
            </nav>
        </>
    );
}
