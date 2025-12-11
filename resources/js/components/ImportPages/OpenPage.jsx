import {useEffect, useState} from "react";
export default function OpenPage(){
    const [workingHours, setWorkingHours] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() =>{
        fetchHours();
    }, []);

    const fetchHours = async () =>{
        try{
            const response = await fetch("/api/workingHours");
            const data = await response.json();
            setWorkingHours(data);
        }catch(err){
            console.log("error", err);
        }finally {
            setLoading(false);
        }

    };

    return(
        <div>
            <div className="container-xxl py-5">
                <div className="container">
                    <div className="row g-0">
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div className="h-100">
                                <img className="img-fluid h-100" src="/assets/img/open.jpg" alt=""/>
                            </div>
                        </div>
                        <div className="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div className="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                                <p className="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Working Hours</p>
                                <h1 className="text-uppercase mb-4">Professional Barbers Are Waiting For You</h1>
                                <div>
                                    {workingHours.map((workingHour, index) =>(
                                        <div key={workingHour.id} className="d-flex justify-content-between border-bottom py-2">
                                            <h6 className="text-uppercase mb-0">{workingHour.day}</h6>
                                            <span className="text-uppercase">
                                        {workingHour.open_time && workingHour.close_time
                                            ? `${workingHour.open_time}AM - ${workingHour.close_time}PM`
                                            : 'Closed'
                                        }
                                      </span>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
