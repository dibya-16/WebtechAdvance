import axios from "axios";
import { useState } from "react";

const OTPSubmit = () =>
{
    const [email, setEmail] = useState(localStorage.getItem('registration_email'));
    const [otp, setOTP] = useState("");
    const [error, setError] = useState("");
    const sendOTP = (e) =>
    {
        e.preventDefault();
        const data = {
            email,
            otp
        }
        axios.post('http://127.0.0.1:8000/api/instructor/register/otp', data)
        .then(success => {
            console.log("Registration Ok");
            window.location.href = "/";
        },
         (error) => {
            setError(error.response.data);
            console.log(error);
        });
    }
    return(
        <div>
            <center>
            <br/>
            <h2>Email Verification Page</h2>
            <br/>
            <form onSubmit={sendOTP}>
                <input type="text" value={email} readOnly={true}/>
                <br/><br/>
                <input type="text" value={otp} placeholder="OTP" onChange={(e)=>{setOTP(e.target.value)}} />
                <br/><br/>
                <input  className="btn btn-success" type="submit" />
            </form> 
            </center>
           
        </div>
    );
}
export default OTPSubmit;