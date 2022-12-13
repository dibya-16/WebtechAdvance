import {useState} from 'react';
import axios from "axios";
import Nav from "./component/Nav.js";
const Feedback = () =>
{
const [clientId, setClientId] = useState("");
const [clientName, setClientName] = useState("");
const [feedback, setFeedback] = useState("");
  const [error, setError] = useState("");
  
  const feedbacks = (e) =>
  {
    e.preventDefault();
    const data = {clientId,clientName,feedback};
    
    axios.post('http://127.0.0.1:8000/api/instructor/feedback', data)
        .then(success => {
            console.log("Feedback Published");
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
          <h1>Feedbacks</h1>
          <br/>
          
      <form onSubmit={feedbacks}>

Client Id: <input type="text" name="clientId"id="clientId" placeholder="Client Id"value={clientId} onChange={(e)=>{setClientId(e.target.value)}} />
<br/>
<span className='input-err'>{error.clientId? error.clientId[0]:''}</span>
<br/>



Client Name: <input type="text" name="clientName" id="clientName"placeholder="Client Name"value={clientName} onChange={(e)=>{setClientName(e.target.value)}}/>
<br/>
<span className='input-err'>{error.clientName? error.clientName[0]:''}</span>
<br/>
<p><b>Feedback</b></p>
   <textarea name="feedback"id="feedback"value={feedback} onChange={(e)=>{setFeedback(e.target.value)}}></textarea>
   <br/>
   <span className='input-err'>{error.feedback? error.feedback[0]:''}</span><br/>
  
  <input className="btn btn-success" type="submit" value="Send"/>
</form>
        </center>

    </div>
  );

    
}
export default Feedback;