<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointments</title>
</head>

@extends('layouts.navbar')
@section('content')
    <center><h2><label style="color:rgb(112, 30, 137)">Appointments</label></h2>

    <body>
        <table border="1">
            <tr>
                
                <th>Client Name</th>
                <th>Client Id</th>
                <th>Topic</th>
               
                <th>Schedule Time</th>
                <th>Date</th>
                <th>Status</th>
                <th colspan="3">Action</th>
              

                
            </tr>
            @foreach ($appointments as $appointment)
            <tr>
                
                <td>{{$appointment->clientName}}</td>
                <td>{{$appointment->clientId}}</td>
                <td>{{$appointment->topic}}</td>
                
                <td>{{$appointment->scheduleTime}}</td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->status}}</td>
                <td><a href="{{route('appointment.status.accept',['id'=>$appointment->id])}}">Accept</a></td>
                <td><a href="{{route('appointment.status.cancel',['id'=>$appointment->id])}}">Cancel</a></td>
                <td><a href="{{route('appointment.status.pending',['id'=>$appointment->id])}}">Pending</a></td>
                
              
            </tr>
            @endforeach
    
        </table>
        
        <br>
        

    </body>
</center>
@endsection

    
    

    

</html>