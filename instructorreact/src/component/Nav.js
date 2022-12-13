//import Logout from "./component/Logout";
import './Nav.css';

const Nav = () =>
{
    return(
        <div>
            <div id="nav-menu">
  <ul>
    <li><a href="/home">Home</a></li>
    <li><a href="/profile">Profile</a></li>
    <li><a href="/changePassword">Change Password</a></li>
    <li><a href="/appointments">Appointments</a></li>
    <li><a href="/sessionSchedule">Session Schedules</a></li>
    <li><a href="/announcement">Announcement</a></li>
    <li><a href="/feedback">Feedback</a></li>
    
    
  </ul>
 </div>

        </div>
    );

}
export default Nav;