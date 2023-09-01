@if (session('message'))
    <div class="alert alert-{{ session('type') ?? 'info' }}">
        {{ session('message') }}
        <button type="button" class="float-end btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
