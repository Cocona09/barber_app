import {useState, useEffect} from "react";
export default function PricePage(){
    const [prices, setPrices] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() =>{
        fetchPrices();
    },[]);

    const fetchPrices = async () =>{
        try{
            const response = await fetch('/api/prices');
            const data = await response.json();
            setPrices(data);
        }
        catch (error){
            console.log('error', error);
        }
        finally {
            setLoading(false);
        }
    };

    return(
        <div>
            {/* Price Start */}
            <div className="container-xxl py-5">
                <div className="container">
                    <div className="row g-0">
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div className="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                                <p className="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Price & Plan</p>
                                <h1 className="text-uppercase mb-4">Check Out Our Barber Services And Prices</h1>
                                <div>
                                    {prices.map((price, index) => (
                                        <div key={price.id} className="d-flex justify-content-between border-bottom py-2">
                                            <h6 className="text-uppercase mb-0">{price.name}</h6>
                                            <span className="text-uppercase text-primary">${price.price}</span>
                                        </div>

                                    ))}
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div className="h-100">
                                <img className="img-fluid h-100" src="/assets/img/price.jpg" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* Price End */}

        </div>
    );
}
