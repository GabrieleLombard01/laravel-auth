@extends('layouts.app')

@section('title', 'Create-Project')

@section('content')
    <header>
        <h3 class="ms-1 fw-bold">Crea un nuovo progetto...</h3>
        <hr>
    </header>

    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" name="title" required value="{{ old('title') }}" maxlength="100"
                        class="form-control" id="title" placeholder="Inserisci il titolo del progetto...">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <textarea class="form-control" name="description" required id="description" rows="5">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="col-3">
                <div class="mb-3">
                    <label for="status" class="form-label">Stato:</label>
                    <select class="w-50 d-block" required name="status" id="status">
                        <option value="In_progresso">In progresso</option>
                        <option value="Completato">Completato</option>
                        <option value="Archiviato">Archiviato</option>
                    </select>
                </div>
            </div>

            <div class="col-9">
                <div class="mb-3">
                    <label for="category" class="form-label">Linguaggi:</label>
                    <input type="text" required class="form-control" id="category" rows="3"
                        placeholder="HTML,CSS,JS..." name="category" maxlength="100" value="{{ old('category') }}">
                </div>
            </div>

            <div class="col-11">
                <div class="mb-3">
                    <label for="thumb" class="form-label">Copertina:</label>
                    <input type="url" name="thumb" value="{{ old('thumb') }}" class="form-control" id="image"
                        placeholder="Inserisci un url...">
                </div>
            </div>
            <div class="col-1">
                <img src="{{ old('thumb', 'https://marcolanci.it/utils/placeholder.jpg') }}" alt="preview"
                    class="img-fluid rounded-3 border border-success h-100" id="img-preview">
            </div>

        </div>


        <div class="mt-4 d-flex justify-content-end">
            <button class="btn btn-success">
                <i class="fas fa-floppy-disk me-2"></i>Salva
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/utils/placeholder.jpg'
        const imageField = document.getElementById('image');
        const previewField = document.getElementById('img-preview');

        imageField.addEventListener('input', () => {
            previewField.src = imageField.value || placeholder;
        });
    </script>
@endsection
