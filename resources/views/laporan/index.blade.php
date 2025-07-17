{{-- get template blade --}}
@extends('template')
@section('content')
    <div class="container">
        <h1 class="mb-4">Kabupaten List</h1>
        {{-- cetak print html --}}
        <button class="btn btn-primary mb-3" onclick="printPage()">Print</button>
        
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Kabupaten</th>
                    <th scope="col">Provinsi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($provinsiCount as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
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