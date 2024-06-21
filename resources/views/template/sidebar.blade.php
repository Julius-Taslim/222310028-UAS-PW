<div id="side_bar" class="h-100" style="background-color:#5078E1; width:22%">
    <div class="px-4 py-3 fw-bold text-white">Logo?</div>
    <div id="divider" class="w-max bg-white" style="height:0.3rem; background-color:#BFBFBF"></div>
    <form method="POST" action="/">
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
                <a href="/{{ $sheet->id }}" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:76%">
                    <i class="bi-list px-1"></i>
                    <div>{{ $sheet->title }}</div>
                </a>
            @endforeach
        @endif
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div id="divider" class="w-max bg-white" style="height:0.3rem; background-color:#BFBFBF"></div>
    <button type="submit" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:76%">
        <i class="bi-people px-1"></i>
        <div>Account</div>
    </button>
</div>
