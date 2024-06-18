@extends('admin.layouts.master')
<style>
    .error {
        color: red;
        border-color: red;
        font-weight: 900;
    }

</style>

@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">utilisateur/Modifier</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">utilisateur Modifier</li>
                    <li class="breadcrumb-item active">utilisateur Modifier</li>
                </ol>
            </div>

            <div class="card mb-4">
                <h6 class="card-header"><i class="feather icon-user"></i>utilisateur Modifier</h6>

                <div class="card-body ">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            @if (\Session::has('insert'))
                                <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                    <i class="feather icon-check-circle" style="font-size:1em"></i>
                                    {!! \Session::get('insert') !!}
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
                    <form method="POST" action="{{ route('user/edit') }}" class="my-5">
                        @csrf
                        <div class="row col-md-12">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $data->name }}" autocomplete="name" autofocus
                                        placeholder="Username">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Prénom</label>
                                    <input id="prename" type="text"
                                        class="form-control @error('prename') is-invalid @enderror" name="prename"
                                        value="{{ $data->prename }}" autocomplete="prename" autofocus
                                        placeholder="Prénom">
                                    @error('prename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $data->email }}" autocomplete="email"
                                        placeholder="Entrer votre email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="clearfix"></div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Téléphone</label>
                                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                        name="tel" value="{{ $data->tel }}" autocomplete="tel"
                                        placeholder="Votre Téléphone">
                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="Enter password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password Confirmation</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="Password confirmation">
                                    <div class="clearfix"></div>
                                </div>
                            </div>



                        </div>

                        <div class="form-group col-md-1">
                            <label class="col-form-label  text-sm-right"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $data->id }}" placeholder="Enter le taux" required>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right"></label>
                            <div class="col-sm-12 ">
                                {{-- <a href="{{ route('admin/users') }}" class="m-r-15  btn btn-secondary text-white ">Retour</a> --}}
                                @if (auth()->user()->role_name == 'super_admin')
                                <button type="submit" id="update" name="update" class="btn btn-primary">Modifier</button>
                                    <!-- Bouton "Enregistrer" activé pour super_admin -->
                                @else
                                    <button type="submit" class="btn btn-primary" disabled>Enregistrer</button>
                                    <!-- Bouton "Enregistrer" désactivé pour les autres -->
                                @endif  
                            </div>
                        </div>


                        {{-- <div class="bg-lightest text-muted small p-2 mt-4">
                        By clicking "Sign Up", you agree to our
                        <a href="javascript:void(0)">terms of service and privacy policy</a>. We’ll occasionally send you account related emails.
                    </div> --}}
                    </form>
                </div>
            </div>

            <!-- [ content ] End -->

        </div>


        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </div>

    <!-- [ Layout content ] Start -->
@endsection
@section('script')
    {{-- hide message js --}}
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
    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
