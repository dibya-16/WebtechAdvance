

import React, {useState} from "react";
import axios from "axios";
import "./Login.css";

const Login = ()=>{
   
    let[email, setEmail] = useState("");
    let[password, setPassword] =useState("");
    let[error, setError] =useState("");

    const loginSubmit = (e)=>{
        e.preventDefault();
        const data = {
            email,
            password,
        };
        
        axios.post("http://localhost:8000/api/instructor/login", data)
        .then(
            (success)=>{
                localStorage.setItem('_instructorAuthToken', success.data.token);
                window.location.href = '/home';
            },
            (error)=>{
                console.log(error);
                setError('Invalid email or password!');
            }
        )
    }

    return(
        <div>

            <center>

                <br/>
                <br/>
                <br/>
                <div className="border border-dark" id="log">
            <fieldset style={{ width: "30%"}}>
                <br/><br/>
             <legend><h1>LOG IN</h1></legend>  
            {error !== ''? <div >{error}</div>:''}
            <form onSubmit={loginSubmit} method="POST">
                <input type="text" id="email"placeholder="Email" value={email} onChange={(e)=>setEmail(e.target.value)}></input><br/>
                <br/>
                <input type="password" id="password"placeholder="Password" value={password} onChange={(e)=>setPassword(e.target.value)}></input><br/>
                <br/>
                <button type="submit"className="btn btn-success">Login</button>
                <br/><br/>
                <h4><a class="btn btn-primary btn-lg " role="button" href="/registration">Not registered yet? </a></h4>
            </form>
            </fieldset>
            </div>
            </center>
            
        </div>

    )
}
export default Login;  
