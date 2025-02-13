<div>
    @if(session()->has('flash_message_success'))
        <div class="alert alert-success">
            {{ session('flash_message_success') }}
        </div>
    @endif
    @if(session()->has('flash_message_failed'))
        <div class="alert alert-danger">
            {{ session('flash_message_failed') }}
        </div>
    @endif
</div>
