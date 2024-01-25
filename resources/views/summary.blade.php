<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Summary Produk</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <h5> Summary </h5>
        <hr>
        <form action="{{ route('download-pdf') }}" target="blank" method="POST">
            @csrf
            <div class="d-flex justify-content-end">
                <h5> Download All PDF: </h5>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-warning"> Download PDF </button>
            </div>
        </form>
        <form action="{{ route('download-pdf') }}" target="blank" method="POST" class="mt-3">
            @csrf
            @foreach ($detailtransaksi as $item)
                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->buku->judul }}</h3>
                        <hr>
                        <h5 class="card-title">Invoice: {{ $item->transaksi->code }}</h5>
                        <p class="card-text">Total Harga: Rp. {{ number_format($item->qty * $item->buku->harga, 3, '.', ',') }}</p>
                        <p class="card-text"> Input Pembayaran: Rp. {{ number_format($item->input_pembayaran, 3, '.', ',') }}</p>
                        <p class="card-text"> Kembalian: Rp. {{ number_format($item->input_pembayaran - $item->qty * $item->buku->harga, 3, ',', '.') }}</p>
                        <div class="col-2 mt-5">
                            <a href="{{ route('invoice', $item->id) }}" class="btn btn-warning"> Download PDF </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
