@extends('admin/layouts.master')

@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
            th{
          text-align: left;
        }

.btn-primary {
    background: linear-gradient(to right, #3ead3e 1%, #014f01);
    /* Dégradé qui part de la droite */
    border: none;
    color: white;
}
.btn-primary:hover {
    background: linear-gradient(to right, #3a983a 1%, #024602); /* Changement de couleur au survol */
    cursor: pointer; /* Changer le curseur pour indiquer que c'est cliquable */
}
.btn-secondary {
    background: linear-gradient(to right, #828482 1%, #585858);
    /* Dégradé qui part de la droite */
    border: none;
    color: white;
}

 
.page-item.active .page-link, .page-item.active .page-link:hover, .page-item.active .page-link:focus, .pagination li.active > a:not(.page-link), .pagination li.active > a:not(.page-link):hover, .pagination li.active > a:not(.page-link):focus {
    border-color: #087a08 !important;
    /* background-color: #087a08 !important; */
    background: linear-gradient(to right, #3ead3e 1%, #014f01) !important;
    color: #fff !important;
        }
    </style>

    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Utilisateurs</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>

                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Utilisateur Infomations</h6>

                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if (\Session::has('insert'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert') !!}
                                        </div>
                                    @endif
                                    @if (\Session::has('warning'))
                                    <div id="hide-message" class="alert alert-warning alert-dismissible fade show">
                                        <i class="feather icon-check-circle" style="font-size:1em"></i>
                                        {!! \Session::get('warning') !!}
                                    </div>
                                @endif

                                    @if (\Session::has('error'))
                                        <div id="hide-message" class="alert alert-danger alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('error') !!}
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <form id="validation" action="{{ route('admin/register') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Nom</label>
                                    <div class="col-sm-10">
                                        <input id="noù" type="text" style="text-transform: uppercase;"
                                            class="form-control @error('name') is-invalid @enderror" name="noù"
                                            value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nom">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Prénom</label>
                                    <div class="col-sm-10">
                                        <input id="prenom" type="text"
                                            class="form-control @error('prename') is-invalid @enderror" name="prenom"
                                            value="{{ old('prename') }}" autocomplete="prename" autofocus
                                            placeholder="Prénom">
                                        @error('prename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Mot de Passe</label>
                                    <div class="col-sm-10">
                                        <input id="mot_pass" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="mot_"
                                            autocomplete="new-password" placeholder="Entrer password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Confirmation Mot de Passe</label>
                                    <div class="col-sm-10">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password"
                                            placeholder="Password confirmation">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Rôle</label>
                                    <div class="col-sm-10">
                                        <input id="role" type="text"
                                            class="form-control @error('role') is-invalid @enderror" name="prename"
                                            value="{{ old('role') }}" autocomplete="role" autofocus
                                            placeholder="Role de l'utilisateur">
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                    <div class="col-sm-10">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email"
                                            placeholder="Entrer votre email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input id="tel" type="tel"
                                            class="form-control @error('tel') is-invalid @enderror" name="tel"
                                            value="{{ old('tel') }}" autocomplete="tel" placeholder="Votre Téléphone">
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                              
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right">Type Utlisateur</label>
                                    <div class="col-sm-10">
                                        <input id="prename" type="text"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="{{ old('prename') }}" autocomplete="type" autofocus
                                            placeholder="type de l'utilisateur">
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-sm-right"></label>
                                    <div class="col-sm-10 d-flex justify-content-between align-items-center">
                                        <button type="reset" class="btn btn-secondary">Annuler</button>
                                        @if (auth()->utilisateur()->role_name === 'super_admin')
                                        <div class=" col-sm-12">
                                            <div class="row mt-3">
                                              <div class=" col-sm-12 d-flex justify-content-between align-items-center">
                                                <button type="reset" class="btn btn-secondary">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                          </div>
                                       
                                        </div>
                                        @else
                                            <button type="submit" class="btn btn-primary" disabled>Enregistrer</button>
                                            <!-- Bouton "Enregistrer" désactivé pour les autres -->
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- [ Layout content ] Start -->
@endsection
@section('script')
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}


    <script>
        $('#validation').validate({
            reles: {
                code: {
                    required: true,
                },
                libelle: {
                    required: true,
                }

            },
            messages: {
                code: "saisissez un code*",
                libelle: "saisissez un libelle*",

            }
        });
    </script>

    {{-- hide message js --}}
    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
