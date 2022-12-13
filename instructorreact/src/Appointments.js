import axiosConfig from "./axiosConfig";
import { useState, useEffect } from "react";
import Nav from "./component/Nav.js";

const Appointments = () =>
{
    const [appointments, setAppointments] = useState([]);
    useEffect(()=>{
        axiosConfig.post('/instructor/appointments')
        .then((rsp)=>{
            setAppointments(rsp.data.appointments);         
        },(err)=>{
            window.location.href = "/";
        })
    }, [])

    const makeAccept = (e, id) =>
    {
        e.preventDefault();
        axiosConfig.post('/instructor/appointments/accept/'+id)
        .then((rsp)=>{
            window.location.href = "/appointments"        
        },(err)=>{
            window.location.href = "/";
        })
    }

    const makeCancel = (e, id) =>
    {
        e.preventDefault();
        axiosConfig.post('/instructor/appointments/cancel/'+id)
        .then((rsp)=>{
            window.location.href = "/appointments"        
        },(err)=>{
            window.location.href = "/";
        })
    }
    const makePending = (e, id) =>
    {
        e.preventDefault();
        axiosConfig.post('/instructor/appointments/pending/'+id)
        .then((rsp)=>{
            window.location.href = "/appointments"        
        },(err)=>{
            window.location.href = "/";
        })
    }

    return(
        <div>
            <Nav></Nav>
            <center>
            <br/>
            <h1>Appointments</h1>
            <br/>
            <br/>
            <table border="1"className="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Client Id</th>
                        <th>Topic</th>
                        <th>Schedule Time</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th colSpan={3}>Action</th>
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
                            <td>{appointment.status}</td>
                            <td><button className="btn btn-success" onClick={(e)=>{makeAccept(e, appointment.id)}}>Accept</button></td>
                            <td><button className="btn btn-danger" onClick={(e)=>{makeCancel(e, appointment.id)}}>Cancel</button></td>
                            <td><button className="btn btn-warning" onClick={(e)=>{makePending(e, appointment.id)}}>Pending</button></td>
                            
                        </tr>
                    ))}
                </tbody>
            </table>
            </center>
           
        </div>
    );

}
export default Appointments;