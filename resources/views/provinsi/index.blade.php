{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Provinsi List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($provinsis as $provinsi)
                    <tr>
                        <th scope="row">{{ $provinsi->id }}</th>
                        <td>{{ $provinsi->nama }}</td>
                        <td>
                            <a href="{{ route('provinsi.show', $provinsi->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('provinsi.edit', $provinsi->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('provinsi.destroy', $provinsi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $Provinsis->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}