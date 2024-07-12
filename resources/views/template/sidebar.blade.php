<div id="side_bar" class="h-100" style="background-color:#5078E1; width:22%; border-right:#aeb9da 2px solid">
    <div class="px-4 py-3 fw-bold text-white">EasySheet</div>
    <div id="divider" class="w-max bg-white" style="height:2px; background-color:#BFBFBF"></div>
    <form method="POST" action="{{ route('sheet.create') }}">
        @csrf
        <button type="submit" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:80%">
            <i class="bi-plus-lg px-1"></i>
            <div>Create New Sheet</div>
        </button>
    </form>
    <div id="divider" class="w-max bg-white" style="height:2px; background-color:#BFBFBF"></div>
    <div id="user_sheets" style="height:65%">
        @if (count($sheets) > 0)
            @foreach ($sheets as $sheet)
                <a href="/sheet/{{ $sheet->id }}" class="btn btn-light mx-4 my-3 fw-semibold d-flex {{ request()->is('sheet/' . $sheet->id) ? 'active' : '' }}" style="width:80%">
                    <div class="d-flex flex-row">
                        <i class="bi-list px-1"></i>
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $sheet->title }}</div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
    <div id="divider" class="w-max bg-white" style="height:2px; background-color:#BFBFBF"></div>
    <button type="button" class="btn btn-light mx-4 my-3 fw-bold d-flex" style="width:80%" data-bs-toggle="modal" data-bs-target="#userInfoModal">
        <i class="bi-people px-1"></i>
        <div>{{ auth()->user()->name }}</div>
    </button>
</div>

<!-- User Info Modal -->
<div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userInfoModalLabel">User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Password:</strong> **********</p>
                <!-- If you want to provide a way to update the password, you can include a form here -->
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if (session()->has('incorrectSheet'))
<div class="alert alert-danger alert-dismissible fade show float-end" style="position: fixed; bottom: 1rem; right: 1rem; z-index:10;" role="alert">
    {{ session('incorrectSheet') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('successDelete'))
<div class="alert alert-success alert-dismissible fade show float-end" style="position: fixed; bottom: 1rem; right: 1rem; z-index:10;" role="alert">
    {{ session('successDelete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('errorDelete'))
<div class="alert alert-success alert-dismissible fade show float-end" style="position: fixed; bottom: 1rem; right: 1rem; z-index:10;" role="alert">
    {{ session('errorDelete') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

