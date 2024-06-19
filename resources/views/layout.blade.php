<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheat Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tiny.cloud/1/cqwnh04b9s4w44bskbwdz5bneumbxkdbu5wg4dyk9bq0g1z9/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });

        function getContent() {
            var content = tinymce.get('mytextarea').getContent();
            alert(content); // You can replace this with any other logic to use the content
        }
    </script>
    <style>
        #user_sheets {
            overflow: scroll;
            /* Allow scrolling */
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        #user_sheets::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, and Opera */
        }
    </style>
</head>

<body>
    <div class="d-flex flex-row w-100 vh-100">
        <div id="side_bar" class="h-100" style="background-color:#5078E1; width:22%">
            <div class="px-4 py-3 fw-bold text-white">Logo?</div>
            <div id="divider" class="w-max bg-white" style="height:0.3rem; background-color:#BFBFBF"></div>
            <form method="POST">
                @csrf
                <button type="submit" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:76%">
                    <i class="bi-plus-lg px-1"></i>
                    <div>Create New Sheet</div>
                </button>
            </form>
            <div id="divider" class="w-max bg-white" style="height:0.3rem; background-color:#BFBFBF"></div>
            <div id="user_sheets" style="height:65%">
                @if (count($sheets) > 0)
                    @foreach ($sheets as $sheet)
                        <button type="submit" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:76%">
                            <i class="bi-list px-1"></i>
                            <div>{{ $sheet->title }}</div>
                        </button>
                    @endforeach
                @endif
            </div>
            <div id="divider" class="w-max bg-white" style="height:0.3rem; background-color:#BFBFBF"></div>
            <button type="submit" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:76%">
                <i class="bi-people px-1"></i>
                <div>Account</div>
            </button>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
