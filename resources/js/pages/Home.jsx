import Carousel from "../components/ImportPages/Carousel.jsx";
import AboutPage from "../components/ImportPages/AboutPage.jsx";
import ServicePage from "../components/ImportPages/ServicePage.jsx";
import PricePage from "../components/ImportPages/PricePage.jsx";
import BarberPage from "../components/ImportPages/BarberPage.jsx";
import OpenPage from "../components/ImportPages/OpenPage.jsx";
import GalleryPage from "../components/ImportPages/GalleryPage.jsx";
export default function Home() {
    return (
        <div>
            <Carousel></Carousel>
            <AboutPage></AboutPage>
            <ServicePage></ServicePage>
            <PricePage></PricePage>
            <BarberPage></BarberPage>
            <OpenPage></OpenPage>
            <GalleryPage></GalleryPage>
        </div>
    );
}
