

<title>Instructor Profile</title>

@extends('layouts.navbar')
@section('content')

<center>

    <h1>Profile</h1>

    <fieldset style="width: 30%"> <br>

    <form method="GET" action="">

       

        Name : {{$instructorName}}

        <br>

        

        Email : {{$instructorEmail}}

        <br>

        

        Phone No : {{$instructorPhoneNo}}

        <br>

        
        Address : {{$instructorAddress}}

        <br>


       
        <p><h3><a href="{{route('instructor.updateProfile')}}"> Click here </a> &nbsp For Update Your Profile</h3></p>

        

        

    </form>

    </fieldset>

</center>
@endsection

