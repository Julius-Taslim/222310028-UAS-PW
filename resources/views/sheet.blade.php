@extends('layout')

@section('content')
    <form action ="/sheet/{{ $sheet->id }}" method="POST" class="w-75 px-5">
        @csrf
        <input type="text" id="title" name="title" class="fs-4 fw-bold py-3" style="border: none; outline: none;"
            value="{{ old('title', $sheet->title) }}">
        <textarea name="body" id="mytextarea">{{ $sheet->body }}</textarea>
        <br>
        <div class="d-flex justify-content-between">
            <div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#deleteModal">Delete</button>
        </div>
    </form>
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this sheet?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="/sheet/{{ $sheet->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('successEdit'))
        <div class="alert alert-success alert-dismissible fade show float-end"
            style="position: fixed; bottom: 1rem; right: 1rem; z-index:10;" role="alert">
            {{ session('successEdit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
