@extends('layout')

@section('content')
<form action ="/sheet" method="post" class="w-75 p-5">
    <textarea id="mytextarea">Hello, World!</textarea>
    <br>
    <button type="button" class="btn btn-success" onclick="getContent()">Save</button>
    <button type="button" class="btn btn-danger" onclick="">Cancel</button>
</form>
@endsection

