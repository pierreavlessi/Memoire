@extends('admin/layouts.master')


@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }
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
            <h4 class="font-weight-bold py-3 mb-0">Enregistrer l'année académique en cours</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Paramétrage / Salles </li>

                </ol>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="card ">
                        <h6 class="card-header"><i class="feather icon-home"></i> Ajouter une Année Académique</h6>

                        <div class="card-body">

                            <div class="">
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
                            <form id="validation" action="{{ route('anneeacademique/save') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="col-sm-12 ">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label text-sm-right">Année Académique</label>
                                            <input type="text" class="form-control" id="annee"
                                                style="text-transform: uppercase;" name="annee" placeholder="Entrer Annee"
                                                required>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-12">
                                    <div class="row mt-3">
                                      <div class=" col-sm-12 d-flex justify-content-between align-items-center">
                                        <button type="reset" class="btn btn-secondary">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                  </div>
                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                  <div class="card mb-4">
                      <h6 class="card-header"><i class="feather icon-user"></i> Année Académique </h6>
  
                      <div class="card-body">
                          <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                              <thead>
                              <tr>
                                  <th>Année Académique</th>
                                  <th class="text-right">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="id" style="text-transform: uppercase;">2025</td>
                                      <td class="text-right">
                                          <a href="" class="m-r-15 text-muted userUpdate">
                                              <i class="fa fa-edit" style="color: #dbb419;"></i>
                                          </a>
                                          <a href="" class="m-r-15 text-muted userUpdate">
                                            <i class="fa fa-eye" style="color: #2196f3;"></i>
                                        </a>
                                          <a href="" onclick="return confirm('Etes vous sûr de vouloir supprimer ceci ?')"><i class="fa fa-trash" style="color: red;"></i></a>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
  
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
