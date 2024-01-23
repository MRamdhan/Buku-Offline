<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    .card{
        margin: 0 auto;
        width: 300px;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="card p-4">
                <h3>Tambah Orderan</h3>
                <form action="{{route('tambahbuku')}}" method="post" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <label for="">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" required>
                    <label for="">Harga Buku</label>
                    <input type="text" class="form-control" name="harga" required>
                    <label for="">Tanggal Pembelian</label>
                    <input type="text" class="form-control" name="tanggal_pembelian" required>
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto" required accept="img/*">
                    <button class="btn btn-success mt-3 form-control" type="submit">Tambah</button>
                </form>
        </div>
    </div>
</body>
</html>
