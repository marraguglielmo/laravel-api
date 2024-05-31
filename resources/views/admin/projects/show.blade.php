@php
    use App\Functions\Helper as Help;
@endphp

@extends('layouts.admin')

@section('content')
    <div class="container project-show-container">
        <h1>{{ $project->title }}</h1>
        <p><strong>Ultima modifica: </strong> {{ Help::formatDate($project->updated_date) }}</p>
        <p><strong>URL GitHub: </strong> <a href="{{ $project->github_url }}"
                target="_blank">{{ $project->github_url ? $project->github_url : 'N/A' }}</a>
        </p>
        <p><strong>Linguaggi utilizzati:</strong> {{ $project->languages }}</p>
        <p><strong>Tipo di progetto:</strong> {{ $project->type->title }} </p>
    </div>
@endsection
