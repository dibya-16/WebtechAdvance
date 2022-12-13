<center>
<fieldset style="width: 30%">
    <legend>
        <h1>LOG IN</h1>
    </legend>
        <form method="POST" action="">
            {{ csrf_field() }}
            
            Instructor Id: <input type="id" name="id" placeholder="Instructor Id" value="">
            <br>
            @error('email')
                {{ $message}}<br>
            @enderror
            <br>
            Password: <input type="password" name="password" placeholder="Password" value="">
            <br>
            @error('password')
                {{ $message}}<br>
            @enderror
            <br>
            @if(Session::has("logged.error"))
            {{Session::get("logged.error")}}
            @endif
            <br>
            <input type="submit" name="login" value="LOG IN">
            <br><br>
           
            <h3><a href="{{route('instructor.registration')}}">Not registered yet? </a></h3>
        </form>
        <br>
     
</fieldset>


</center>
   
