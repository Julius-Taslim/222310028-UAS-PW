<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100 p-4" style="background-color:#5078E1">
        @if (session()->has('loginError'))
            <div class="container w-50 mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <form action="/register" method="POST" class="mt-4 container d-flex flex-column w-50 p-5 rounded-5" style="background-color:#EEF0F8">
            @csrf
            <h3 class="text-center fw-bold">Sign In</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name')}}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="npm@student.ibik.ac.id" value="{{ old('email') }}">
            </div>

            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password">
                <span class="input-group-text">
                    <i class="bi bi-eye" id="btn-eye"></i>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
            <a href="{{route('login')}}" class="btn btn-outline-primary">Back to Log In</a>
        </form>
    </div>

    <script>
        const btnEye = document.querySelector("#btn-eye")
        const password = document.getElementById("password");
        const email = document.getElementById("email");

        btnEye.addEventListener("click", function() {
            if (password.type === "password") {
                password.type = "text"
                btnEye.classList.remove("bi-eye");
                btnEye.classList.add("bi-eye-slash");
                console.log(email.value + " " + password.value)
            } else {
                password.type = "password"
                btnEye.classList.remove("bi-eye-slash");
                btnEye.classList.add("bi-eye");
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
