<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login</title>
    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
   
    
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
                            <form action="" method="post">
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
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('register.form')}}" 
                                    class="link-danger">Register</a></p>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cjMd6EtUpRVnJoHyX+51ptbV65+5tX+NF9I3zqW3A0u6v/u0apZ/6p6H5L7KwMgB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+c6MAdNpH1flVWTpLk+bPQ7KgV8rW34ZZfYjZG3PAgR2Xp+qq0N6GnHD7o4eGa" crossorigin="anonymous"></script>


</body>
</html>
