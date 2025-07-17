{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Penduduk</h1>
        <form action="{{ route('penduduk.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penduduk</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
            <label for="provinsi_id" class="form-label">Provinsi</label>
            <select class="form-select"  id="provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                @endforeach
            </select>
            </div>
            <div class="mb-3">
            <label for="kabupaten_id" class="form-label">Kabupaten</label>
            <select class="form-select" name="kabupaten_id"  id="kabupaten">
                <option value="">Pilih Kabupaten</option>
            </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

        {{-- {{ $Provinsis->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}
<!-- Script kamu -->
@section('scripts')
    <script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            let provinsiId = $(this).val();
            $('#kabupaten').html('<option>Loading...</option>');

            if (provinsiId) {
                $.get(`/api/kabupaten/${provinsiId}`, function(data) {
                    let html = '<option value="">Pilih Kabupaten</option>';
                    data.forEach(k => {
                        html += `<option value="${k.id}">${k.nama}</option>`;
                    });
                    $('#kabupaten').html(html);
                });
            }
        });
    });
    </script>
    @endsection
