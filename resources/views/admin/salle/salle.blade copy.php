@extends('admin/layouts.master')


@section('content')
<style>
    .error {
        color: red;
        border-color: red;
        font-weight: 900;
    }
</style>

<!-- [ Layout content ] Start -->
<div class="layout-content">
    <!-- [ content ] Start -->
  <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3"></h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"></a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Informations sur Salle</div>
                        </div>
                        <div class="col-lg-12">
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
                            <div class="clearfix">
                                <div  class="row">
                                   
                                <form action="{{ route('salle/save') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="col-md-12 col-lg-12">
                                    <div class="form-group row">
                                    <label for="libelle_salle">Libelle Salle:</label>
                                    <input type="text" name="libelle_salle" id="libelle_salle" required>
                                    
                                    <label for="capacite">Capacité:</label>
                                    <input type="number" name="capacite" id="capacite" required>
                                    
                                    <label for="equipement">Équipement:</label>
                                    <input type="text" name="equipement" id="equipement">
                                </div>
                                    <div class="form-group row">
                                        <label for="disponibilite">Disponibilité:</label>
                                        <input type="checkbox" name="disponibilite" id="disponibilite" value="1">
                                        
                                        <label for="type_salle">Type Salle:</label>
                                        <input type="text" name="type_salle" id="type_salle" required>
                                        
                                        <label for="batiment">Bâtiment:</label>
                                        <input type="text" name="batiment" id="batiment" required>
                                    </div>
                                    
                                    <div class="form-group row">
                                    <label for="responsable">Responsable:</label>
                                    <input type="text" name="responsable" id="responsable">
                                    
                                    <button type="submit"class="btn btn-success" >Ajouter Salle</button>
                                </div>
                            </div>
                        </div>
                                </form>
                           
                        </div>
                            </div>
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
<script src="{{asset('assets/js/jquery.validate.js') }}"></script>
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