@extends('layout')

@section('content')
    <form action ="/{{ $sheet->id }}" method="POST" class="w-75 p-5">
        @csrf
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $sheet->title) }}">
        <textarea name="body" id="mytextarea">{{ $sheet->body }}</textarea>
        <br>
        <div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </div>
    </form>
@endsection
