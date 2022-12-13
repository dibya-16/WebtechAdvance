import {useState} from 'react';
import axios from "axios";
import "./Register.css";
const Registration = () =>
{
    const [name, setName] = useState("");
    
     const [email, setEmail] = useState("");
     const [phoneNo, setPhoneNo] = useState("");
     const [address, setAddress] = useState("");
    const [password, setPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");

    
    const [error, setError] = useState("");
    
    const register = (e) =>
    {
      e.preventDefault();
      const data = {name, email, phoneNo, address, password, confirmPassword};
      
      axios.post('http://127.0.0.1:8000/api/instructor/register', data)
          .then(success => {
              console.log("Registration Ok");
              //localStorage.set("user", userId);
              //localStorage.get("user");
              localStorage.setItem("registration_email", email);
              window.location.href = "/otp-submit";
          },
           (error) => {
            console.log(error.response.data);
              setError(error.response.data);
          });
    
    }
    return (
        <div >
           <center>
            
           <br/>
                <br/>
                <br/>
          <div id="register">
         
            <br/>
            <br/>
              <br/>
              <fieldset>
              <form onSubmit={register} >
                <h1>Registration Form</h1>
                <br/>
        Name:   <input type="text" id="name" name="name" placeholder="Name" value={name} onChange={(e)=>{setName(e.target.value)}}/><br/>
        <span className='input-err'>{error.name? error.name[0]:''}</span>
        <br/>
        Email:  <input type="text" id="email" name="email" placeholder="Email" value={email} onChange={(e)=>{setEmail(e.target.value)}}/><br/>
        <span className='input-err'>{error.email? error.email[0]:''}</span>
        <br/>
        Phone no:<input type="text" id="phoneNo" name="phoneNo" placeholder="Phone No" value={phoneNo} onChange={(e)=>{setPhoneNo(e.target.value)}}/><br/>
        <span className='input-err'>{error.phoneNo? error.phoneNo[0]:''}</span>
        <br/>
        Address:  <input type="text" id="address" name="address" placeholder="Address" value={address} onChange={(e)=>{setAddress(e.target.value)}}/><br/>
        <span className='input-err'>{error.address? error.address[0]:''}</span>
        <br/>
        Password:  <input type="password" id="password" name="password" placeholder="Password" value={password} onChange={(e)=>{setPassword(e.target.value)}}/><br/>
        <span className='input-err'>{error.password? error.password[0]:''}</span>
        <br/>
        Confirm Password:  <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" value={confirmPassword} onChange={(e)=>{setConfirmPassword(e.target.value)}}/><br/>
        <span className='input-err'>{error.confirmPassword? error.confirmPassword[0]:''}</span>
        <br/>
        <input className="btn btn-success" type="submit" value="Register"/>

        <br/><br/>
        <p><h3> Already registered? <a class="btn btn-primary btn-lg " role="button" href="/"> Click here </a> for login.</h3></p>
      </form>
              </fieldset>
              </div>
      </center>
            
    </div>

    );
}
export default Registration;