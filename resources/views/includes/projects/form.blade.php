@if ($project->exists)
    <form method="POST" action="{{ route('admin.projects.update', $project) }}">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.projects.store') }}">
@endif
@csrf

<div class="row">

    <div class="col-6">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" name="title" required value="{{ old('title', $project->title) }}" maxlength="100"
                class="form-control" id="title" placeholder="Inserisci il titolo del progetto...">
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label class="form-label">Slug:</label>
            <input disabled type="text" maxlength="100" class="form-control" id="slug"
                value="{{ Str::slug(old('title', $project->title), '-') }}">
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea class="form-control" name="description" required id="description" rows="5">{{ old('description', $project->description) }}</textarea>
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="status" class="form-label">Stato:</label>
            <select aria-label="Default select example" class="form-select" required name="status" id="status"
                value="{{ old('status', $project->status) }}">
                <option disabled selected>Seleziona... </option>
                <option>In progresso</option>
                <option>Completato</option>
                <option>Archiviato</option>
            </select>
        </div>
    </div>

    <div class="col-9">
        <div class="mb-3">
            <label for="category" class="form-label">Linguaggi:</label>
            <input type="text" required class="form-control" id="category" rows="3"
                placeholder="HTML,CSS,JS..." name="category" maxlength="100"
                value="{{ old('category', $project->category) }}">
        </div>
    </div>

    <div class="col-11">
        <div class="mb-3">
            <label for="thumb" class="form-label">Copertina:</label>
            <input type="url" name="thumb" value="{{ old('thumb', $project->thumb) }}" class="form-control"
                id="image" placeholder="Inserisci un url...">
        </div>
    </div>
    <div class="col-1">
        <img src="{{ old('thumb', $project->thumb ?? 'https://marcolanci.it/utils/placeholder.jpg') }}" alt="preview"
            class="img-fluid rounded-3 border border-success h-100" id="img-preview">
    </div>

</div>


<div class="mt-4 d-flex justify-content-end">
    <button class="btn btn-success">
        <i class="fas fa-floppy-disk me-2"></i>Salva
    </button>
</div>
</form>