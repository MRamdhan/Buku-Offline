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
    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('prosesbayar.buku', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <img src="{{asset($buku->foto)}}" class="card-img-top">
                    </div>
                </div>
    
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$buku->judul}}</h3>
                            <hr>
                            <p class="card-text"> Harga: Rp. {{number_format($buku->harga, 3, ',','.')}}</p>
                            <p class="card-text"> Total Harga: Rp. {{number_format($detailtransaksi->totalharga, 3, ',','.')}}</p>
                            <p class="card-text"> Banyak: {{$detailtransaksi->qty}}</p>
                            <hr>
                            <div class="mb-2">
                                <label for="input_pembayaran" class="form-label">Input Pembayaran</label>
                                <input type="text" class="form-control" id="input_pembayaran" name="input_pembayaran" required>
                            </div>                            
                            <hr>
                            <h5> Keterangan :</h5>
                            <p>Silahkan Input nomil uang dari pelanggan</p>
                            <button class="btn btn-success"> Kirim </button>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
    </div>
</body>
</html>