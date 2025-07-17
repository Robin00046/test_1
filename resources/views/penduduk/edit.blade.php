{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Penduduk</h1>
        <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penduduk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $penduduk->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penduduk->alamat }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L" {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $penduduk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="provinsi_id" class="form-label">Provinsi</label>
                <select class="form-select" id="provinsi" name="provinsi_id" >
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $penduduk->kabupaten->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                            {{ $provinsi->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kabupaten_id" class="form-label">Kabupaten</label>
                <select class="form-select" name="kabupaten_id"  id="kabupaten">
                    <option value="">Pilih Kabupaten</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
{{-- end get template blade --}}
@section('scripts')
<script>
$(document).ready(function () {
    const selectedKabupatenId = `{{ $penduduk->kabupaten_id }}`;
    const selectedProvinsiId = $('#provinsi').val();

    function loadKabupaten(provinsiId, callback) {
        $('#kabupaten').html('<option>Loading...</option>');

        if (provinsiId) {
            $.get(`/api/kabupaten/${provinsiId}`, function (data) {
                let html = '<option value="">Pilih Kabupaten</option>';
                data.forEach(k => {
                    const selected = (k.id == selectedKabupatenId) ? 'selected' : '';
                    html += `<option value="${k.id}" ${selected}>${k.nama}</option>`;
                });
                $('#kabupaten').html(html);

                if (typeof callback === 'function') callback();
            });
        } else {
            $('#kabupaten').html('<option value="">Pilih Kabupaten</option>');
        }
    }

    // Load kabupaten saat halaman dibuka
    if (selectedProvinsiId) {
        loadKabupaten(selectedProvinsiId);
    }

    // Load kabupaten saat provinsi diganti
    $('#provinsi').on('change', function () {
        let provinsiId = $(this).val();
        // Reset selectedKabupatenId to prevent wrong selection on change
        loadKabupaten(provinsiId);
    });
});
</script>
@endsection