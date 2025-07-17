{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Kabupaten</h1>
        <form action="{{ route('kabupaten.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kabupaten</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="provinsi_id" class="form-label">Provinsi</label>
                <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kabupaten.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

        {{-- {{ $Provinsis->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}