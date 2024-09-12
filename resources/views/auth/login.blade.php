<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/import/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/import/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        label,
        p {
            color: black;
        }
        .btn-green {
    
            color: #228522;
            text-align: center;
            /* Pour centrer le texte */
        }
        .btn-primary {
            background: linear-gradient(to right, #3ead3e 1%, #014f01);
            /* Dégradé qui part de la droite */
            border: none;
            color: white;
            text-align: center;
            /* Pour centrer le texte */
        }
    </style>
</head>

<body style="background-color: #00794d; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div class="container " >

        <!-- Outer Row -->
        <div class="row w-100"  >

            <div class="col-xl-12 col-lg-12 col-md-9 mx-auto"  >              
                <div class="card o-hidden border-0 shadow-lg mx-auto  ">
                    <div class="card-body p-0" >
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class=" mb-4 btn-green font-weight-bold">Connexion </h2>

                                    </div>
                                    <div class=" font-weight-bold">
                                        <p class="text-justify">Veuillez vous connecter pour accéder aux fonctionnalités avancées de gestion des salles de cours</p>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            @if (\Session::has('insert'))
                                                <div id="hide-message"
                                                    class="alert alert-success alert-dismissible fade show">
                                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                                    {!! \Session::get('insert') !!}
                                                </div>
                                            @endif
                                            @if (\Session::has('warning'))
                                                <div id="hide-message"
                                                    class="alert alert-warning alert-dismissible fade show">
                                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                                    {!! \Session::get('warning') !!}
                                                </div>
                                            @endif

                                            @if (\Session::has('error'))
                                                <div id="hide-message"
                                                    class="alert alert-danger alert-dismissible fade show">
                                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                                    {!! \Session::get('error') !!}
                                                </div>
                                            @endif
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('authentificate') }}" class="my-4">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email <span style="color: red;">*</span></label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="email" autofocus
                                                placeholder="Entrer votre email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe <span
                                                    style="color: red;">*</span></label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" autocomplete="current-password"
                                                placeholder="Taper votre mot de passe">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row p-1">
                                            <button type="submit" class="btn btn-primary mx-auto"
                                                style="text-align: center !important;">Connexion</button>
                                        </div>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="large font-weight-bold" style="color: #676a68" href="{{ route('register') }}">Mot de passe
                                            oublié ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->


</body>



</html>
