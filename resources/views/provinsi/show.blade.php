{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Show Provinsi</h1>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Provinsi</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $provinsi->nama }}" readonly>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $provinsi->created_at }}" readonly>
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $provinsi->updated_at }}" readonly>
        </div>
        <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('provinsi.edit', $provinsi->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('provinsi.destroy', $provinsi->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

        {{-- {{ $Provinsis->links() }} --}}
    
@endsection
{{-- end get template blade --}}