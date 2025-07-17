{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Show Kabupaten</h1>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kabupaten</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kabupaten->nama }}" readonly>
        </div>
        <div class="mb-3">
            <label for="provinsi_id" class="form-label">Provinsi</label>
            <select class="form-select" id="provinsi_id" name="provinsi_id" disabled>
                <option value="">Pilih Provinsi</option>
                @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}" {{ $kabupaten->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                        {{ $provinsi->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('kabupaten.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('kabupaten.edit', $kabupaten->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('kabupaten.destroy', $kabupaten->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>

        {{-- {{ $Kabupatens->links() }} --}}

        {{-- {{ $Provinsis->links() }} --}}
    
@endsection
{{-- end get template blade --}}