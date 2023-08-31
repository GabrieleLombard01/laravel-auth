@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <header>
        <h1>{{ $project->title }}</h1>
    </header>
@endsection
