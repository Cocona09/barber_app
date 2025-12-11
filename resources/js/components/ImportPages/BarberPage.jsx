import {useState, useEffect} from "react";
export default function BarberPage(){
    const [barbers, setBarbers] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() =>{
        fetchBarbers();
    }, []);

    const fetchBarbers = async () =>{
        try{
            setLoading(true);
            const response = await fetch('/api/barbers');
            const data = await response.json();
            setBarbers(data);
        }catch(error){
            console.error('Error:', error);
        }finally {
            setLoading(false);
        }
    };

    return(
        <div>
            <div className="container-xxl py-5">
                <div className="container">
                    <div className="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style={{maxWidth: "600px"}}>
                        <p className="d-inline-block bg-secondary text-primary py-1 px-4">Our Barber</p>
                        <h1 className="text-uppercase">Meet Our Barber</h1>
                    </div>
                    <div className="row g-4">
                        {barbers.slice(0, 4).map((barber, index) => (
                            <div key={barber.id} className="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div className="team-item">
                                    <div className="team-img position-relative overflow-hidden">
                                        <img className="img-fluid" src={`${barber.image}`} alt={barber.image}/>
                                        <div className="team-social">
                                            <a className="btn btn-square" href=""><i className="fab fa-facebook-f"></i></a>
                                            <a className="btn btn-square" href=""><i className="fab fa-twitter"></i></a>
                                            <a className="btn btn-square" href=""><i className="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div className="bg-secondary text-center p-4">
                                        <h5 className="text-uppercase">{barber.name}</h5>
                                        <span className="text-primary">{barber.specialties}</span>
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
