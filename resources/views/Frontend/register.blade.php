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
                            <h5>Register</h5>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"
                                    style="background-color:#c7081b">
                                    <strong>Success!</strong> {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method="post" action='' >
                                @csrf
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" id="fullName"class="form-control" placeholder="Full Name"
                                        name="name">
                                    @if ($errors->has('name'))
                                        <span class="text-primary">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email"
                                        name="email">
                                    @if ($errors->has('email'))
                                    <span class="text-primary">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="typePasswordX" class="form-label">Password</label>
                                    <input type="password" id="typePasswordX" class="form-control"
                                        placeholder="Password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-primary">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="confirmPassword" class="form-control"
                                        placeholder="Confirm Password" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-primary">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{route('login.form')}}" 
                                class="link-primary">Login</a></p>
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
