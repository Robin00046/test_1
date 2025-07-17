{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Kabupaten List</h1>
        {{-- cetak print html --}}
        <button class="btn btn-primary mb-3" onclick="printPage()">Print</button>
        <form method="GET" action="/laporan/kabupaten">
            <label for="provinsi">Filter Provinsi:</label>
            <select name="provinsi" id="provinsi" onchange="this.form.submit()">
                <option value="">Semua Provinsi</option>
                @foreach($provinsi as $item)
                    <option value="{{ $item->nama }}" {{ request('provinsi') == $item->nama ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
                <!-- Tambahkan pilihan lain -->
            </select>
        </form>
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Kabupaten</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Jumlah Penduduk</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($kabupatenCount as $item)
                    <tr>
                        <td>{{ $item['nama_kabupaten'] }}</td>
                        <td>{{ $item['nama_provinsi'] }}</td>
                        <td>{{ $item['jumlah_penduduk'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $items->links() }} --}}
    </div>
@endsection
{{-- end get template blade --}}

<script>

    // Function to print the current page
    function printPage() {
        window.print();
    }

    // Add event listener to the print button
    document.querySelector('.btn-primary').addEventListener('click', printPage);
</script>