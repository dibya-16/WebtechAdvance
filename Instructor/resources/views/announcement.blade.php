

<title>Announcement</title>

@extends('layouts.navbar')
@section('content')

<center>

    <h1>Announcement</h1>

    <fieldset style="width: 30%"> <br>

    <form method="POST" action="">

        {{ csrf_field() }}

        <p><b>Write Here</b></p>
         <textarea name="announcement" rows="15"style="width:300px; height:150px;"></textarea>
         <br>
         @error('announcement')

            {{ $message}}<br>

        @enderror
       
       <br>
       <br>
        <input type="submit" name="publish" value="Publish">

    </form>

    </fieldset>

</center>
@endsection

