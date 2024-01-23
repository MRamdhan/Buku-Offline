<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('postkeranjang.buku', $buku->id) }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-4">
                <div class="card">
                    <img src="{{ asset($buku->foto) }}" class="card-img-top">
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $buku->judul }}</h3>
                        <p class="card-text">Rp. {{ number_format($buku->harga,3,',','.') }}</p>
                        <input type="number" name="banyak" id="" class="form-control" placeholder="banyak" required>
                        <hr>
                        <h5> Keterangan : </h5>
                        <p>Ini merupakan ditel dari barang yang di jual silahkan pelajari dengan seksama. Brang yang sudah di beli</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5> Input ID User : </h5>
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Input ID Pelanggan" required>                </div>
                    <button class="btn btn-success mt-3 form-control" > Beli </button>
                </div>
        </div>
    </form>
    </div>
</body>
</html>
