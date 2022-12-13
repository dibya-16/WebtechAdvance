import './App.css';

import {BrowserRouter, Route, Routes } from 'react-router-dom';
import Registration from "./Registration";
import Login from "./Login";
import Home from "./Home";
import Profile from "./Profile";
import ProfileUpdate from "./ProfileUpdate";
import Appointments from "./Appointments";
import OTPSubmit from "./OTPSubmit";
import SessionSchedule from "./SessionSchedule";
import Announcement from "./Announcement";
import Feedback from "./Feedback";
import ChangePassword from "./ChangePassword";






function App() {
  return(
     <>
     <BrowserRouter>
     <Routes>
      <Route path= "/registration" element={<Registration/>} />
      <Route path= "/otp-submit" element={<OTPSubmit/>} />
      <Route path= "/" element={<Login/>} />
      <Route path= "/home" element={<Home/>} />
      <Route path= "/profile" element={<Profile/>} />
      <Route path= "/profileUpdate" element={<ProfileUpdate/>} />
      <Route path= "/changePassword" element={<ChangePassword/>} />
      <Route path= "/appointments" element={<Appointments/>} />
      <Route path= "/sessionSchedule" element={<SessionSchedule/>} />
      <Route path= "/announcement" element={<Announcement/>} />
      <Route path= "/feedback" element={<Feedback/>} />
      
      <Route path= "/abort" element={404} />
     </Routes>
     </BrowserRouter>
     </>
  );
}

export default App;
