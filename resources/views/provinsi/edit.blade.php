{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Provinsi</h1>
        <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
            {{-- CSRF token for security --}}
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Provinsi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $provinsi->nama }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

        {{-- {{ $Provinsis->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}