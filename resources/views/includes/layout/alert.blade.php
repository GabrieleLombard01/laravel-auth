@if (session('alert-message'))
    <div class="alert alert-{{ session('alert-type') ?? 'info' }}">
        {{ session('alert-message') }}
        <button type="button" class="float-end btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
