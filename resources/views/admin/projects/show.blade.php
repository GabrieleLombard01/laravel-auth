@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <div id="show" class="container">

        <header>
            <h3 class="ms-1 fw-bold">{{ $project->title }}</h3>
            <hr>
        </header>

        <div class="card mb-3" style="max-width: 1200px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $project->thumb }}" class="m-2 img-fluid rounded-start" alt="{{ $project->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $project->category }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $project->status }}</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">

            <div class="col-3">
                <a class=" btn border fw-bold" href="{{ route('admin.projects.index') }}"><i
                        class="me-2 fa-solid fa-circle-left"></i>Torna ai
                    progetti</a>


            </div>

            <div class="col-3 d-flex justify-content-end">
                <!--EDIT-->
                <a class="me-3 mb-3 fw-bold text-decoration-none btn btn-sm btn-warning"
                    href="{{ route('admin.projects.edit', $project) }}">
                    <i class="pe-2 fas fa-pencil"></i>Modifica
                </a>

                <!--DELETE-->
                <form class="d-inline" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" mb-3 btn btn-sm btn-danger">
                        <a class=" fw-bold text-decoration-none" href="#">
                            <i class="pe-2 fas fa-trash"></i>Elimina
                        </a>
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection
