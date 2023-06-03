@extends('layouts.app')

@section('title')
    HOME
@endsection

@section('content')
<h2>Text input fields</h2>

<form action="{{ route('Jadwal.create') }} method="POST">
    @csrf
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <textarea id="w3review" name="w3review" rows="4" cols="50">
    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
    </textarea>
    <button type="submit" class="btn">aksi</button>
</form>

<p>Note that the form itself is not visible.</p>

<p>Also note that the default width of text input fields is 20 characters.</p>
@endsection
