import axiosConfig from "./axiosConfig";
import { useState, useEffect } from "react";
import Nav from "./component/Nav.js";

const SessionSchedule = () =>
{
    const [appointments, setAppointments] = useState([]);
    useEffect(()=>{
        axiosConfig.post('/instructor/sessionSchedule')
        .then((rsp)=>{
            setAppointments(rsp.data.appointments);         
        },(err)=>{
            window.location.href = "/";
        })
    }, [])

    

    return(
        <div>
            <Nav></Nav>
            <br/>
            <center>
            <h1>Session Schedules</h1>
            <br/><br/>
            <table className="table table-striped table-dark">
            
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Client Id</th>
                        <th>Topic</th>
                        <th>Schedule Time</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    {appointments.map(appointment => (
                        <tr key={appointment.id}>
                            <td>{appointment.clientName}</td>
                            <td>{appointment.clientId}</td>
                            <td>{appointment.topic}</td>
                            <td>{appointment.scheduleTime}</td>
                            <td>{appointment.date}</td>
                            
                            
                        </tr>
                    ))}
                </tbody>
            </table>
            </center>
        </div>
    );

}
export default SessionSchedule;