{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Penduduk List</h1>
        {{-- Tambah Data --}}
        <a href="{{ route('penduduk.create') }}" class="btn btn-primary mb-3">Tambah Penduduk</a>
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Nama Kabupaten</th>
                    {{-- tanggal lahir --}}
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penduduks as $penduduk)
                    <tr>
                        <th scope="row">{{ $penduduk->id }}</th>
                        <td>{{ $penduduk->nama }}</td>
                        <td>{{ $penduduk->kabupaten->provinsi->nama }}</td>
                        <td>{{ $penduduk->kabupaten->nama }}</td>
                        <td>{{ $penduduk->tanggal_lahir }}</td>
                        <td>{{ $penduduk->jenis_kelamin }}</td>
                        <td>{{ $penduduk->alamat }}</td>
                        <td>
                            <a href="{{ route('penduduk.show', $penduduk->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $kabupatens->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}