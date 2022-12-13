import { useState, useEffect } from "react";
import axiosConfig from "./axiosConfig";
import Logout from "./Logout";
import Nav from "./component/Nav.js";
const Home = () =>
{
    const [name, setName] = useState("");
    useEffect(() => {
        axiosConfig.post("/instructor/dashboard").then
            ((rsp)=>{
                setName(rsp.data.instructor.name);               
            },(err)=>{
                window.location.href = "/";
            })
    } , []);

    
    return(

    <div>
        <Nav></Nav>
        <center>
        <br/>
        <h1>Home Page</h1>
        <br/><br/>
        <h3>Hello,{name}</h3>
        <h4>Welcome to meditation online platform as an instructor!! </h4>
        <br/>
        <Logout/>
        
        </center>
       
    </div>

    );


} 
export default Home;  