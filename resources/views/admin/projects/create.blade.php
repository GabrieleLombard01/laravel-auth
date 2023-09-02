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
                    <label for="content" class="form-label">Descrizione:</label>
                    <textarea class="form-control" id="content" rows="5">
                        {{ old('content') }}
                    </textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Stato:</label>
                    <select class="w-50 d-block" required name="status" id="status">
                        <option value="{{ old('status') }}">In progresso</option>
                        <option value="{{ old('status') }}">Completato</option>
                        <option value="{{ old('status') }}">Archiviato</option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="category" class="form-label">Linguaggi:</label>
                    <input type="text" required class="form-control" id="category" rows="3"
                        placeholder="HTML,CSS,JS..." name="category" maxlength="100" value="{{ old('category') }}">
                </div>
            </div>

            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Copertina:</label>
                    <input type="url" name="image" value="{{ old('image') }}" class="form-control" id="image"
                        placeholder="Inserisci un url...">
                </div>
            </div>
            <div class="col-1">
                <img src="{{ old('image', 'https://marcolanci.it/utils/placeholder.jpg') }}" alt="preview"
                    class="img-fluid rounded-3 border border-success">
            </div>

        </div>


        <div class="mt-4 d-flex justify-content-end">
            <button class="btn btn-success">
                <i class="fas fa-floppy-disk me-2"></i>Salva
            </button>
        </div>
    </form>
@endsection
