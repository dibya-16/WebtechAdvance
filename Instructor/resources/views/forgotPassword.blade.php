
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Forget Password </title>

</head>

<center>
<body>

	




  <form action="" method="POST">
  {{ csrf_field() }}
    <h2>Forget Password Page:</h2>
  	<fieldset>
  		<legend><h2>Change Password</h2></legend>
  Previous Email:<input type="text"name="email"Placeholder="Email"><br>
  <br>
  @error('email')
                {{ $message}}<br>
            @enderror
            <br>
  New Password:<input type="password"name="newPassword"Placeholder="New Password"><br>
  <br>
  @error('newPassword')
                {{ $message}}<br>
            @enderror
            Confirm Password: <input type="password" name="confirmPassword" placeholder="Confirm Password"><br>
        @error('confirmPassword')
            {{$message}}
        @enderror        <br>
  <br>
  <input type="submit"name="forgot" value="Request For New Password">
</fieldset>
  </form>
</center>
</html>