@extends('admin/layouts.master')


@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
            
        }
        .btn-custom:hover {
            background-color: #005a3c; }
    </style>

    <!-- [ Layout content ] Start -->
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Ajouter une Salle</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"> Salle </li>

                </ol>
            </div>

            <div class="row">

                <div class="col-md-8">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i>Salles Information</h6>

                        <div class="card-body">

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
                            <form id="validation" action="{{ route('salle/save') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="row lg-12">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="libelle_salle">Libelle Salle:</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="capacite">Capacité:</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                  </div>
                                  
                                <div class="row lg-12">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="libelle_salle">Equipement :</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="capacite">Type de salle  :</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                  </div>
                                  <div class="row lg-12">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="libelle_salle">Batiment :</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="capacite">Responsable :</label>
                                      <input type="text" class="form-control" placeholder="" aria-label="">
                                    </div>
                                  </div>

                                  <div class="row l-12">
                                    <div class="col-md-6 col-lg-6">
                                        <label for="disponibilite">Disponibilité :</label>
                                        <input type="checkbox" name="disponibilite" id="disponibilite" value="1">
                                       
                                    </div>
                                  </div>                                     
                                  
                                </div>

                                <div class="row ">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mx-auto"
                                            style="text-align: center  !important;" >Enrégistrer</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mx-auto "
                                            style="text-align: center  !important;">Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- [ content ] End -->
        </div>


    </div>

    <!-- [ Layout content ] Start -->
@endsection
@section('script')
    <!-- library js validate -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
    {{-- form validate --}}



    {{-- hide message js --}}
    <script>
        $('#hide-message').show();
        setTimeout(function() {
            $('#hide-message').hide();
        }, 5000);
    </script>
@endsection
