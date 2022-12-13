<html>
    <head> 
        <center>
        <h3>
            
            <button type="button" onclick="window.location='{{route('instructor.home')}}'">Home</button>
        
            <button type="button" onclick="window.location='{{route('instructor.profile')}}'">Profile</button>
            <button type="button" onclick="window.location='{{route('instructor.changePassword')}}'">Change Password</button>
            
            <button type="button" onclick="window.location='{{route('instructor.appointments')}}'">Appointments</button>
        
            <button type="button" onclick="window.location='{{route('instructor.session_Schedules')}}'">Session_Schedules</button>
        
            <button type="button" onclick="window.location='{{route('instructor.announcement')}}'">Announcement</button>
            <button type="button" onclick="window.location='{{route('instructor.feedback')}}'">Feedback</button>
            <button type="button" onclick="window.location='{{route('instructor.logout')}}'">Logout</button>
            
        </h3>
</center>
    </head>
    <body bgcolor="#CCCCFF">
        @yield('content')
    </body>
    <br> <br> <br>
    
</html>
