import {useState} from 'react';
import axios from "axios";
import Nav from "./component/Nav.js";
const Announcement = () =>
{
const [announcement, setAnnouncement] = useState("");
  const [error, setError] = useState("");
  
  const announce = (e) =>
  {
    e.preventDefault();
    const data = {announcement};
    
    axios.post('http://127.0.0.1:8000/api/instructor/announcement', data)
        .then(success => {
            console.log("Announcement Published");
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
        <br/>
        <center>
          <h1>Announcement</h1>
          <br/>
          <form onSubmit={announce}>
      
      <h3>Write Here</h3>
         <textarea  rows="10" name="announcement"id="announcement"value={announcement} onChange={(e)=>{setAnnouncement(e.target.value)}}></textarea>
         <br/>
         <span className='input-err'>{error.announcement? error.announcement[0]:''}</span>
         <br/>
        
        <input className="btn btn-success" type="submit" value="Publish"/>
      </form>
        </center>
      
    </div>
  );

    
}
export default Announcement;