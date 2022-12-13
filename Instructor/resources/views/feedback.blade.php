

<title>Feedback</title>

@extends('layouts.navbar')
@section('content')

<center>


    <fieldset style="width: 30%"> <br>

    <form method="POST" action="">

        {{ csrf_field() }}

        Client Id: <input type="text" name="clientId" placeholder="Client Id" >

<br>

@error('clientId')

    {{ $message}}
@enderror

<br>

Client Name: <input type="text" name="clientName" placeholder="Client Name">



@error('clientName')

    {{ $message}}

@enderror
<br><br><br>

<p><b>Feedback:</b></p>
         <textarea name="feedback" rows="5"style="width:150px; height:100px;"></textarea>
         <br>
         @error('feedback')

            {{ $message}}

        @enderror
       <br>
       <br>
        <input type="submit" name="send" value="Send">

    </form>

    </fieldset>

</center>
@endsection

