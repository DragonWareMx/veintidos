<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-10 col-xl-9 mx-auto d-flex flex-column">
                <div class="card card-signin flex-row my-auto" style="background-color: transparent">
                    <div class="card-img-left d-none d-md-flex" style="background-color: transparent">
                        <div style="background-color: turquoise">
                            Iniciar sesion

                            slogan

                            Copyright
                        </div>
                    </div>
                    <div class="card-body card-login">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="inputUserame" class="form-control" placeholder="Username"
                                    required autofocus>
                                <label for="inputUserame">Username</label>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    required>
                                <label for="inputEmail">Email address</label>
                            </div>
                            <hr>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputConfirmPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputConfirmPassword">Confirm password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Register</button>
                            <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>