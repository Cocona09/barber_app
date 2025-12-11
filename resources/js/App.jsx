import { BrowserRouter, Routes, Route } from "react-router-dom";
import Header from "./components/Header.jsx";
import Home from "./pages/Home.jsx";
import About from "./pages/About.jsx";
import Service from "./pages/Service.jsx";
import Contact from "./pages/Contact.jsx";
import Price from "./pages/Price.jsx";
import Barber from "./pages/Barber.jsx";
import Open from "./pages/Open.jsx";
import Gallery from "./pages/Gallery.jsx";
import AppointmentBooking from "./pages/Booking.jsx";
import Footer from "./components/Footer.jsx";

function App() {
    return (
        <BrowserRouter>
            <Header/>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
                <Route path="/service" element={<Service />} />
                <Route path="/price" element={<Price />} />
                <Route path="/barber" element={<Barber />} />
                <Route path="/open" element={<Open />} />
                <Route path="/gallery" element={<Gallery />} />
                <Route path="/contact" element={<Contact />} />
                <Route path="/appointment" element={<AppointmentBooking />} />
            </Routes>
            <Footer/>
        </BrowserRouter>
    );
}

export default App;
