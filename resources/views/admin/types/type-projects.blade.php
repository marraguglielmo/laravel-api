@extends('layouts.admin')

@section('content')
    <h1>Elenco per tipo</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Progetti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td class="w-25">{{ $type->title }}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($type->projects as $project)
                                <li class="list-group-item">{{ $project->title }}, <a
                                        href="{{ $project->github_url }}">{{ $project->github_url }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
