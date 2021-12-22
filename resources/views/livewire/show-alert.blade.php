<div>
    @if ($message = Session::get('message'))
    <div class="toast show">
        <div class="toast-header">
            Message
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
    @endif
</div>
