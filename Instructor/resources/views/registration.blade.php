

<title>Instructor Registration</title>



<center>

    <h1>REGISTRATION FORM</h1>

    <fieldset style="width: 30%"> <br>

    <form method="POST" action="">

        {{ csrf_field() }}

        Name : <input type="text" name="name" placeholder="Name" value="{{old('name')}}">

        <br>

        @error('name')

            {{ $message}}<br>

        @enderror

        <br>

        Email : <input type="email" name="email" placeholder="Email" value="{{old('email')}}" >

        <br>

        @error('email')

            {{ $message}}<br>

        @enderror

        <br>

        Phone No : <input type="phoneNo" name="phoneNo" placeholder="phoneNo" value="{{old('phoneNo')}}" >

        <br>

        @error('phoneNo')

            {{ $message}}<br>

        @enderror

        <br>

        Address : <input type="address" name="address" placeholder="address" value="{{old('address')}}" >

        <br>

        @error('address')

            {{ $message}}<br>

        @enderror

        <br>

        Password : <input type="password" name="password" placeholder="Password" value="">

        <br>

        @error('password')

            {{ $message}}<br>

        @enderror

        <br>

        Confirm Password : <input type="password" name="confirmPassword" placeholder="Re-enter Password" value="">

        <br>

        @error('confirmPassword')

            {{ $message}}<br>

        @enderror

        <br>

        <input type="submit" name="register" value="REGISTER">
        <p><h3> Already registered? <a href="{{route('instructor.login')}}"> Click here </a> for login.</h3></p>
    </form>

    </fieldset>

</center>

