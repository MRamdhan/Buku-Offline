<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <section class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-center mb-4 mt-5">Buku Offline</h1>
                    <div class="card card-default">
                        <div class="card-body">
                            <h3 class="mb-3">Login</h3>
                            <form action="{{ route('postlogin') }}" class="form-group" method="POST">
                                @if (session('notif'))
                                    <div class="alert alert-danger">
                                        {{ session('notif') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="form-group my-3">
                                    <label for="email" class="mb-1 text-muted">Email </label>
                                    <input type="email" id="email" name="email" value=""
                                        class="form-control">
                                </div>
                                <!-- s: input -->
                                <div class="form-group my-3">
                                    <label for="password" class="mb-1 text-muted">Password</label>
                                    <input type="password" id="password" v-model="password" name="password"
                                        value="" class="form-control">
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
