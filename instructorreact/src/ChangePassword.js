import {useState} from 'react';
import axiosConfig from "./axiosConfig";
import Nav from "./component/Nav.js";
const Feedback = () =>
{
const [password, setPassword] = useState("");
const [newPassword, setNewPassword] = useState("");
const [confirmPassword, setConfirmPassword] = useState("");
  const [error, setError] = useState("");
  
  const changePassword = (e) =>
  {
    e.preventDefault();
    const data = {password,newPassword,confirmPassword};
    
    axiosConfig.post('/instructor/changePassword', data)
        .then(success => {
            console.log("Password Updated");
            //localStorage.set("user", userId);
            //localStorage.get("user");
            //window.location.href = "/register";
        }, (error) => {
          console.log(error.response.data);
            setError(error.response.data);
        });

  
  }

  return (
    <div>
        <Nav></Nav>
        <center>
          <br/>
          <h1>Change Password</h1>
          <br/> <br/>
          <form onSubmit={changePassword}>

Old Password:   <input type="password" name="password"id="password"placeholder="Old Password"value={password} onChange={(e)=>{setPassword(e.target.value)}} />
<br/>
<span className='input-err'>{error.password? error.password[0]:''}</span><br/>

New Password:   <input type="password" name="newPassword"id="newPassword"placeholder="New Password"value={newPassword} onChange={(e)=>{setNewPassword(e.target.value)}} />
<br/>
<span className='input-err'>{error.newPassword? error.newPassword[0]:''}</span><br/>

Confirm Password:   <input type="password" name="confirmPassword"id="confirmPassword"placeholder="Confirm Password"value={confirmPassword} onChange={(e)=>{setConfirmPassword(e.target.value)}} />
<br/>
<span className='input-err'>{error.confirmPassword? error.confirmPassword[0]:''}</span><br/>

  
  <input className="btn btn-success" type="submit" value="Update"/>
</form>
        </center>

     
    </div>
  );

    
}
export default Feedback;