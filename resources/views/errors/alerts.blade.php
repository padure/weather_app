@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if (session('completed'))
    <div class="alert alert-success" role="alert">
        {{ session('completed') }}
    </div>
@endif
