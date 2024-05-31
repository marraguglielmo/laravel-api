@extends('layouts.admin')

@section('content')
    <div class="container m-0">
        <h3 class="my-5">Technologies</h3>



        <div class="container p-1">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif


            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- create --}}
            <form action="{{ route('admin.technologies.store') }}" method="POST" class="d-flex w-50">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Aggiungi linguaggio" aria-label="Search"
                    name="title">
                <button class="btn btn-outline-success" type="submit">Aggiungi</button>
            </form>



        </div>


        <table class="table crud-table w-50">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($technologies as $technology)
                    <tr>
                        <td>
                            {{-- update --}}
                            <form action="{{ route('admin.technologies.update', $technology) }}" method="POST"
                                id="form-edit-{{ $technology->id }}">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{ $technology->title }}" name="title">
                            </form>
                        </td>
                        <td class="d-flex">
                            <button type="button" onclick="submitForm({{ $technology->id }})"
                                class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></button>

                            {{-- delete --}}
                            <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function submitForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
