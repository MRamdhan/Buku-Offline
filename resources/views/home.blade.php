<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
    <title>Welcome</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        @if (session('notif'))
            <div class="alert alert-success">
                {{ session('notif') }}
            </div>
        @endif
        <div class="hero py-5 bg-light p-3">
            <div class="container">
                <h1> Buku Offline </h1>
                <a href="/tambah" class="btn btn-primary mt-2">
                    Tambah Buku
                </a>
            </div>
        </div>
        <div class="list-form py-5">
            <div class="container">
                <form action="{{ route('postkeranjang.buku', $buku->first()->id) }}" method="POST">
                    @csrf
                    <div>
                        <h5> ID Pelanggan : </h5>
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Input ID Pelanggan"
                        required>
                    </div>
                    <h5 class="mb-3 mt-3">List Buku</h5>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success " style="width: 100px"> Beli </button>
                    </div>
                    @foreach ($buku as $item)
                        <div class="card card-default mb-3 mt-2">
                            <div class="card-body" style="display: flex; align-items: center;">
                                <img src="{{ $item->foto }}" alt="" style="width: 100px; margin-right: 20px;">
                                <div style="flex: 1;">
                                    <h3 class="mb-1">{{ $item->judul }}</h4>
                                    <small class="text-muted">Harga Barag : Rp. {{ $item->harga }}</small>
                                    <hr>
                                    <label label for="buku_{{ $item->id }}">Jumlah Barang :</label>
                                    <input type="number" name="banyak[{{ $item->id }}]"
                                        id="buku_{{ $item->id }}" class="form-control p-2"
                                        placeholder="Jumlah Barang :">
                                    <div class="mt-2">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                            id="flexCheckDefault" name="selected_buku[]"> Select this book
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</body>

</html>
