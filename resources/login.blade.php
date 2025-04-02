<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Admin/css/login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Admin/css/extras.css">
</head>

<body>
    <style>
        body {
            background-image: url('../images/slide-show4.jpg');
            background-size: cover;
        }
    </style>
    <div class="py-5 mt-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Login Form</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <p>{{ session()->get('error') }}</p>
                            </div>
                            @endif
                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                              
                        
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login_btn" class="btn btn-danger w-100">Login Now</button>
                                </div>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('user.register.form')}}" 
                                    class="link-danger">Register</a></p>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-light py-4" style="margin-top:205px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5 class="text-uppercase mb-4">AutoAdvertise Plus</h5>
                    <p class="mb-0">&copy; 2020 Theme Suite. All rights reserved.</p>
                </div>
                <div class="col-lg-8 col-md-6">
                    <ul class="list-inline text-center text-lg-end mb-0">
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="bi bi-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
