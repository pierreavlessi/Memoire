@extends('admin/layouts.master')


@section('content')
    <style>
        .error {
            color: red;
            border-color: red;
            font-weight: 900;
        }

        th {
            text-align: left;
        }

        .btn-primary {
            background: linear-gradient(to right, #3ead3e 1%, #014f01);
            /* Dégradé qui part de la droite */
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #3a983a 1%, #024602);
            /* Changement de couleur au survol */
            cursor: pointer;
            /* Changer le curseur pour indiquer que c'est cliquable */
        }

        .btn-secondary {
            background: linear-gradient(to right, #828482 1%, #585858);
            /* Dégradé qui part de la droite */
            border: none;
            color: white;
        }


        .page-item.active .page-link,
        .page-item.active .page-link:hover,
        .page-item.active .page-link:focus,
        .pagination li.active>a:not(.page-link),
        .pagination li.active>a:not(.page-link):hover,
        .pagination li.active>a:not(.page-link):focus {
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
            <h4 class="font-weight-bold py-3 mb-0">Modifier une salle</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin/home') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Paramétrage / Salles </li>

                </ol>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="card ">
                        <h6 class="card-header"><i class="feather icon-home"></i> Modifier une salle</h6>

                        <div class="card-body">

                            <div class="">
                                <div class="col-sm-12">
                                    @if (\Session::has('insert'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('insert') !!}
                                        </div>
                                    @endif
                                    @if (\Session::has('success'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="feather icon-check-circle" style="font-size:1em"></i>
                                            {!! \Session::get('success') !!}
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
                            <form id="validation" action="{{ route('salle.update', $salle->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Indique que cette requête est une mise à jour -->

                                <div class="col-sm-12 ">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label text-sm-right">Désignation</label>
                                            <input type="text" class="form-control" id="libelle"
                                                style="text-transform: uppercase;" name="libelle" placeholder="SALLE A"
                                                value="{{ old('libelle', $salle->libelle) }}" required>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label text-sm-right">Type Salle</label>
                                            <select class="form-control" name="type_salle" id="type_salle" required>
                                                <option value="" disabled>Selectionnez un type</option>
                                                @foreach ($typesSalles as $typeSalle)
                                                    <option value="{{ $typeSalle->id }}"
                                                        {{ $typeSalle->id == $salle->type_salle_id ? 'selected' : '' }}>
                                                        {{ $typeSalle->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label text-sm-right">Capacité</label>
                                            <input type="number" class="form-control" id="capacite"
                                                style="text-transform: uppercase;" name="capacite" placeholder="100"
                                                value="{{ old('capacite', $salle->capacite) }}" required>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label text-sm-right">Bâtiment</label>
                                            <input type="text" class="form-control" id="batiment"
                                                style="text-transform: uppercase;" name="batiment" placeholder="Bâtiment A2"
                                                value="{{ old('batiment', $salle->batiment) }}" required>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label text-sm-right">Responsable</label>
                                            <input type="text" class="form-control" id="responsable"
                                                style="text-transform: uppercase;" name="responsable"
                                                value="{{ old('responsable', $salle->responsable) }}"
                                                placeholder="DOSSOU JEAN">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label text-sm-right">Description/Equipements</label>
                                            <textarea class="form-control" rows=4 id="equipement" name="equipement" placeholder="Description">{{ old('equipement', $salle->equipement) }}</textarea>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row mt-3">
                                        <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                            <button type="reset" class="btn btn-secondary">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card mb-4">
                        <h6 class="card-header"><i class="feather icon-user"></i> Liste des Salles </h6>

                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Salle</th>
                                        <th>Type</th>
                                        <th>Capacité</th>
                                        <th>Bâtiment</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($salles as $item)
                                        <tr>
                                            <td class="id" style="text-transform: uppercase;">{{ $item->libelle }}
                                            </td>
                                            <td class="id" style="text-transform: uppercase;">
                                                {{ $item->typeSalle->type }}</td>
                                            <td class="id" style="text-transform: uppercase;">{{ $item->capacite }}
                                            </td>
                                            <td class="id" style="text-transform: uppercase;">{{ $item->batiment }}
                                            </td>
                                            <td class="text-right">

                                                <a href="{{ route('salle.edit', $item->id) }}"
                                                    class="m-r-15 text-muted userUpdate">
                                                    <i class="fa fa-edit" style="color: #dbb419;"></i>
                                                </a>
                                                <a href="" class="m-r-15 text-muted userUpdate">
                                                    <i class="fa fa-eye" style="color: #2196f3;"></i>
                                                </a>
                                                <a href="{{ url('admin/salle/delete/' . $item->id) }}"
                                                    onclick="return confirm('Etes vous sûr de vouloir supprimer ceci ?')"><i
                                                        class="fa fa-trash" style="color: red;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
