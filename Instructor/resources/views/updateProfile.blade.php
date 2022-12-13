

<title>Instructor Update Profile</title>

@extends('layouts.navbar')
@section('content')

<center>

    <h1>Updated Profile</h1>

    <fieldset style="width: 30%"> <br>

    <form method="POST" action="">

        {{ csrf_field() }}

        Name : <input type="text" name="name" placeholder="Name" value="{{$instructorName}}">

        <br>

        @error('name')

            {{ $message}}<br>

        @enderror

        <br>

        Email : <input type="email" name="email" placeholder="Email" value=" {{$instructorEmail}}">

        <br>

        @error('email')

            {{ $message}}<br>

        @enderror

        <br>

        Phone No : <input type="phoneNo" name="phoneNo" placeholder="phoneNo" value="{{$instructorPhoneNo}}" >

        <br>

        @error('phoneNo')

            {{ $message}}<br>

        @enderror

        <br>

        Address : <input type="address" name="address" placeholder="address" value="{{$instructorAddress}}" >

        <br>

        @error('address')

            {{ $message}}<br>

        @enderror

        <br>

       <input type="hidden" value="{{$instructorId}}"name="id">
       

        <input type="submit" name="update" value="Update">

    </form>

    </fieldset>

</center>
@endsection

