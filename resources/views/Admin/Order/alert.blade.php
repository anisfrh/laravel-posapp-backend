@if ($message = Session::get('success'))

<div class="alert alert-succes alert-dismissable show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>X</span>
        </button>
        <p>{{ $message }}</p>
    </div>
</div>

@endif