import axiosConfig from "./axiosConfig";
import { useState, useEffect } from "react";
import Nav from "./component/Nav.js";
const ProfileUpdate = () =>
{
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [phoneNo, setPhoneNo] = useState("");
    const [address, setAddress] = useState("");
    const [error, setError] = useState("");

    useEffect(()=>{
        axiosConfig.post("/instructor/profile").then
            ((rsp)=>{
                setName(rsp.data.instructor.name);
                setEmail(rsp.data.instructor.email); 
                setPhoneNo(rsp.data.instructor.phoneNo); 
                setAddress(rsp.data.instructor.address);                
            },(err)=>{
                window.location.href = "/";
            })
    },[])

    const update = (e) =>
    {
        e.preventDefault();
        const data = {
            name,
            email,
            phoneNo,
            address
        };
        axiosConfig.post("/instructor/profile/update", data).then
            ((rsp)=>{
                window.location.href = "/profile";               
            },(err)=>{
                setError(err.response.data);
                console.log(err);
            })
    }

    return(
        <div>
            <Nav></Nav>
           
            <center>
            <br/>
            <h1>Profile Update</h1>
            <br/><br/>
            <form onSubmit={update}>
                Name:   <input type="text" id="name" name="name" placeholder="Name" value={name} onChange={(e)=>{setName(e.target.value)}}/><br/>
                <span className='input-err'>{error.name? error.name[0]:''}</span>
                <br/>
                Email:  <input type="text" id="email" name="email" placeholder="Email" value={email} onChange={(e)=>{setEmail(e.target.value)}}/><br/>
                <span className='input-err'>{error.email? error.email[0]:''}</span>
                <br/>
                Phone no:  <input type="text" id="phoneNo" name="phoneNo" placeholder="Phone No" value={phoneNo} onChange={(e)=>{setPhoneNo(e.target.value)}}/><br/>
                <span className='input-err'>{error.phoneNo? error.phoneNo[0]:''}</span>
                <br/>
                Address:  <input type="text" id="address" name="address" placeholder="Address" value={address} onChange={(e)=>{setAddress(e.target.value)}}/><br/>
                <span className='input-err'>{error.address? error.address[0]:''}</span>
                <br/>
                <input className="btn btn-success" type="submit" value="Update"/>
            </form>
            </center>
           
        </div>

    )
}

export default ProfileUpdate;