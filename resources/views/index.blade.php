{{-- get template blade --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-4">Kabupaten List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kabupaten</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kabupatens as $kabupaten)
                    <tr>
                        <th scope="row">{{ $kabupaten->id }}</th>
                        <td>{{ $kabupaten->nama }}</td>
                        <td>{{ $kabupaten->provinsi->nama }}</td>
                        <td>
                            <a href="{{ route('kabupaten.show', $kabupaten->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('kabupaten.edit', $kabupaten->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kabupaten.destroy', $kabupaten->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $kabupatens->links() }}
    </div>
@endsection
{{-- end get template blade --}}
@extends('template')