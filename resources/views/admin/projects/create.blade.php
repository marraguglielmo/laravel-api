@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="mb-4">Aggiungi un progetto</h2>
            <form action="{{ route('admin.projects.store') }}" method="POST" class="text-start">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" name="title" id="title" placeholder="Titolo"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea type="text" name="description" id="description" placeholder="Descrizione" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="thumb" class="form-label">Immagine</label>
                    <input type="text" name="thumb" id="thumb" placeholder="Immagine"
                        class="form-control @error('thumb') is-invalid @enderror" value="{{ old('thumb') }}">
                    @error('thumb')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select name="type_id" id="type" placeholder="Tipo"
                        class="form-select @error('price') is-invalid @enderror" value="{{ old('type') }}">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                    @error('price')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="technologies" class="form-label">Tecnologie utilizzate: </label>
                    <div class="btn-group btn-group-sm" role="group">
                        @foreach ($technologies as $technology)
                            <input name="technologies" type="checkbox" class="btn-check" autocomplete="off"
                                id="tech_{{ $technology->id }}" value="{{ $technology->id }}">
                            <label class="btn btn-outline-success fw-semibold border-2"
                                for="tech_{{ $technology->id }}">{{ $technology->title }}</label>
                        @endforeach
                    </div>
                    @error('technologies')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="updated_at" class="form-label">Data creazione</label>
                    <input type="date" name="updated_at" id="date"
                        class="form-control @error('sale_date') is-invalid @enderror" value="{{ old('date') }}">
                    @error('date')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="github_url" class="form-label">Github</label>
                    <input type="text" name="github_url" id="github_url" placeholder="Github URL"
                        class="form-control @error('artists') is-invalid @enderror" value="{{ old('github_url') }}">
                    @error('github_url')
                        <small class="text-danger fw-semibold">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="my-2">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>

            </form>

        </div>
    </div>
@endsection
