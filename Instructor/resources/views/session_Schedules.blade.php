<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session_Schedule</title>
</head>

@extends('layouts.navbar')
@section('content')
    <center><h2><label style="color:rgb(112, 30, 137)">Session_Schedule</label></h2>

    <body>
        <table border="1">
            <tr>
                
                <th>Client Name</th>
                <th>Topic</th>
                <th>Schedule Time</th>
                <th>Date</th>
                
              

                
            </tr>
            @foreach ($appointments as $appointment)
            <tr>
                
                <td>{{$appointment->clientName}}</td>
               
                <td>{{$appointment->topic}}</td>
                
                <td>{{$appointment->scheduleTime}}</td>
                <td>{{$appointment->date}}</td>
               
                
              
            </tr>
            @endforeach
    
        </table>
        
        <br>
        

    </body>
</center>
@endsection

    
    

    

</html>