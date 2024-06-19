@extends('index')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center fw-bold">Sign In</h3>

        @if (session()->has('loginError'))
            <div class="container d-flex w-50 mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <form action="/login" method="POST" class="mt-4 container d-flex flex-column w-50">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="npm@student.ibik.ac.id" value="{{ old('email') }}">
            </div>

            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password">
                <span class="input-group-text">
                    <i class="bi bi-eye" id="btn-eye"></i>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
