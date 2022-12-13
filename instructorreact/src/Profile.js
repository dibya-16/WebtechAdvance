import axiosConfig from "./axiosConfig";
import { useState, useEffect } from "react";
import Nav from "./component/Nav.js";
const Profile = () =>
{
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [phone, setPhoneNumber] = useState("");
    const [address, setAddress] = useState("");

    useEffect(()=>{
        axiosConfig.post("/instructor/profile").then
            ((rsp)=>{
                setName(rsp.data.instructor.name);
                setEmail(rsp.data.instructor.email); 
                setPhoneNumber(rsp.data.instructor.phoneNo); 
                setAddress(rsp.data.instructor.address);                
            },(err)=>{
                window.location.href = "/";
            })
    },[])

    return(
        <div>
            <Nav></Nav>
            <br/>
            <br/>
            <center>
            <h1>Instructor Profile</h1>
            <br/>
            <br/>
            <b>
            <p>Name: {name}</p>
            <p>Phone No: {phone}</p>
            <p>Email: {email}</p>
            <p>Address: {address}</p>
            </b>
           
            <div>
                
        <p><h3><a class="btn btn-primary btn-lg " role="button" href="/profileUpdate"> Click here </a> For Update Your Profile</h3></p>

        
               
            </div>
            </center>

           
        </div>

    )
}

export default Profile;