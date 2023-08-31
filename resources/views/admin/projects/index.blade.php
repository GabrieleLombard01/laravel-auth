@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1 class="text-center pt-3 pb-3">Progetti:</h1>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Linguaggi</th>
                <th scope="col">Stato</th>
                <!--<th></th>-->
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->category }}</td>
                    <td>{{ $project->status }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">
                        <h3>Non ci sono progetti</h3>
                    </td>
                </tr>
            @endforelse
            </tr>
        </tbody>
    </table>
@endsection
