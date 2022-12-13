@extends('layouts.navbar')
<title>Change Password</title>
@section('content')
<center>
<fieldset style="width:40%">
    <form action="" method="post">
        {{ csrf_field() }}
        <br>
        Old Password: <input type="password" name="password" placeholder="Old Password" ><br>
        @error('password')
            {{$message}} <br>
        @enderror
        <br>       
        New Password: <input type="password" value="" name="newPassword" placeholder="New Password"><br>
        @error('newPassword')
            {{$message}} <br>
        @enderror
        <br>
        Confirm Password: <input type="password" name="confirmPassword" placeholder="Confirm Password"><br>
        @error('confirmPassword')
            {{$message}}
        @enderror
        <br>
        <input type="hidden" value="{{$instructorId}}"name="id">
        <input type="submit" name="ChangePassword" value="Change Password">
    </form>    
</fieldset>
</center>
@endsection