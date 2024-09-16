<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title> Gestion des salles - ENA BENIN</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="participation citolyenne, MAirie de cotonou." />
    <meta name="keywords" content="participation citolyenne, Benin, Mairie de coronou">
    <meta name="AKPAGNONNIDE SIDOINE" content="participation citoyenne" />
    <!-- survey-JS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-ena.PNG') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shreerang-material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flot/flot.css') }}">

    @livewireStyles

    {{-- ----------------------datatable --}}
    {{-- A  remettre --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css"
        type="text/css" />

    {{-- <link rel="stylesheet" href="{{'assets/css/datatable/dataTables.bootstrap4.min.css'}}" />
    <link rel="stylesheet" href="{{'assets/css/datatable/jquery.dataTables.min.css'}}">
    <link rel="stylesheet" href="{{'assets/css/datatable/responsive.bootstrap4.min.css'}}" type="text/css" /> --}}
    @yield('style')
    {{-- ----------------------datatable --}}

    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

</head>

<style>
    /* close icon */
    .close:focus,
    .close:hover {
        color: rgb(255, 0, 0);
        text-decoration: none;
        opacity: .75;
        outline: none !important;
    }

    .close {
        font-size: 45px !important;
        margin-top: 5px !important;
    }
</style>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">

            {{-- -------------------------------------------- --}}

            @include('admin/sidebar.sidebar')

            {{-- menu --}}

            {{-- @yield('menu') --}}
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x"
                    id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/images/logo-ena.PNG') }}" alt="Brand Logo" class="img-fluid"
                                width="30">

                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">{{ Auth::user()->name }}
                            {{ Auth::user()->prename }}</span>
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">
                        {{-- <div class="navbar-nav align-items-lg-center">
                            <!-- Search -->
                            <label class="nav-item navbar-text navbar-search-box p-0 active">
                                <i class="feather icon-search navbar-icon align-middle"></i>
                                <span class="navbar-search-input pl-2">
                                    <input type="text" class="form-control navbar-text mx-2" placeholder="Search...">
                                </span>
                            </label>
                        </div> --}}

                        <div class="navbar-nav align-items-lg-center ml-auto">
                            {{-- <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-bell navbar-icon align-middle"></i>
                                    <span class="badge badge-danger badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div
                                                class="ui-icon ui-icon-sm feather icon-home bg-secondary border-0 text-white">
                                            </div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">Login from 192.168.1.1</div>
                                                <div class="text-light small mt-1">
                                                    Aliquam ex eros, imperdiet vulputate hendrerit et.
                                                </div>
                                                <div class="text-light small mt-1">12h ago</div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div
                                                class="ui-icon ui-icon-sm feather icon-user-plus bg-info border-0 text-white">
                                            </div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">You have
                                                    <strong>4</strong> new followers
                                                </div>
                                                <div class="text-light small mt-1">
                                                    Phasellus nunc nisl, posuere cursus pretium nec, dictum vehicula
                                                    tellus.
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div
                                                class="ui-icon ui-icon-sm feather icon-power bg-danger border-0 text-white">
                                            </div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">Server restarted</div>
                                                <div class="text-light small mt-1">
                                                    19h ago
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div
                                                class="ui-icon ui-icon-sm feather icon-alert-triangle bg-warning border-0 text-dark">
                                            </div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">99% server load</div>
                                                <div class="text-light small mt-1">
                                                    Etiam nec fringilla magna. Donec mi metus.
                                                </div>
                                                <div class="text-light small mt-1">
                                                    20h ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all
                                        notifications</a>
                                </div>
                            </div> --}}

                            {{-- <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-mail navbar-icon align-middle"></i>
                                    <span class="badge badge-success badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Messages</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        4 New Messages
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <img src="assets/img/avatars/6-small.png"
                                                class="d-block ui-w-40 rounded-circle" alt>
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">Lorem ipsum dolor
                                                    consectetuer elit.</div>
                                                <div class="text-light small mt-1">
                                                    Josephin Doe &nbsp;·&nbsp; 58m ago
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/4-small.png') }}"
                                                class="d-block ui-w-40 rounded-circle" alt>
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet,
                                                    consectetuer.</div>
                                                <div class="text-light small mt-1">
                                                    Lary Doe &nbsp;·&nbsp; 1h ago
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/5-small.png') }}"
                                                class="d-block ui-w-40 rounded-circle" alt>
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet
                                                    elit.</div>
                                                <div class="text-light small mt-1">
                                                    Alice &nbsp;·&nbsp; 2h ago
                                                </div>
                                            </div>
                                        </a>

                                        <a href="javascript:"
                                            class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <img src="{{ asset('assets/img/avatars/11-small.png') }}"
                                                class="d-block ui-w-40 rounded-circle" alt>
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">Lorem ipsum dolor sit amet
                                                    consectetuer amet elit dolor sit.</div>
                                                <div class="text-light small mt-1">
                                                    Suzen &nbsp;·&nbsp; 5h ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all
                                        messages</a>
                                </div>
                            </div> --}}

                            <!-- Divider -->
                            <div
                                class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">
                                |</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        {{-- <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                            class="d-block ui-w-30 rounded-circle"> --}}
                                        <i class="far fa-user-circle"></i>
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ Auth::user()->name }}
                                            {{ Auth::user()->prename }}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:" class="dropdown-item" data-toggle="modal"
                                        data-target="#ViewProfile">
                                        {{-- <i class="feather icon-user text-muted"></i> &nbsp; My profile</a> --}}
                                        {{-- <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-mail text-muted"></i> &nbsp; Messages</a> --}}
                                        {{-- <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-settings text-muted"></i> &nbsp; Account settings</a> --}}
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('logout') }}" class="dropdown-item">
                                            <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->
                {{-- content layout --}}

                @yield('content')

                <nav class="layout-footer footer bg-white">
                    <div
                        class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                        <div class="pt-3">
                            <span class="footer-text font-weight-semibold">&copy; <a href="http://star-labs.bj/"
                                    class="footer-link" target="_blank">ENA DOC - All right reserved</a></span>
                        </div>
                        <div>
                            {{-- <a href="javascript:" class="footer-link pt-3"></a> --}}
                            <a href="#" class="footer-link pt-3 ml-4"><?php $Year = date('Y'); ?>
                                {{ $Year }}</a>
                            {{-- <a href="#" class="footer-link pt-3 ml-4">All right reserved</a> --}}
                            {{-- <a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a> --}}
                        </div>
                    </div>
                </nav>
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    {{-- model profile user --}}

    <!-- Modal User-->
    <div style =" z-index: 1;" class="modal fade" id="ViewProfile" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="v_name" name="name" class="form-control"
                                    value="{{ Auth::user()->name }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="text" id="v_email" name="email" class="form-control"
                                    value="{{ Auth::user()->email }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="tel" id="v_phone_number" name="mobile" class="form-control"
                                    value="{{ Auth::user()->phone_number }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Group ID</label>
                            <div class="col-sm-9">
                                <input type="text" id="v_groupid" name="groupid" class="form-control"
                                    value="{{ Auth::user()->group_id }}" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="v_role_name" name="role_name" class="form-control"
                                    value="{{ Auth::user()->role_name }} " readonly />
                            </div>
                        </div>
                    </div>
                    <!-- form add end -->
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="icofont icofont-eye-alt"></i>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal User-->






    {{-- --------------------------------------------- datatable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="  https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src=" https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.jss"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>


    {{-- <script src="{{asset('assets/js/jquery-3.5.1.js') }}"></script> 

<script src="{{'assets/js/datatable/jquery.dataTables.min.js'}}"></script>
    
  <script src="{{'assets/js/datatable/dataTables.bootstrap4.min.js'}}"></script>

  <script src="{{'assets/js/datatable/dataTables.responsive.min.js'}}"></script> --}}

    {{-- <script src="  https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script> --}}
    {{-- --------------------------------------------- datatable --}}

    <!-- Core scripts -->
    <script src="{{ asset('assets/js/pace.js') }}"></script>
    {{-- <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script> --}}
    <script src="{{ asset('assets/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/sidenav.js') }}"></script>
    <script src="{{ asset('assets/js/layout-helpers.js') }}"></script>
    <script src="{{ asset('assets/js/material-ripple.js') }}"></script>

    <!-- Libs -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/libs/eve/eve.js') }}"></script>
    <script src="{{ asset('assets/libs/flot/flot.js') }}"></script>
    <script src="{{ asset('assets/libs/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/core.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/charts.js') }}"></script>
    <script src="{{ asset('assets/libs/chart-am4/animated.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/analytics.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboards_index.js') }}"></script>
    {{-- hide message js --}}
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                // "scrollX": true,
                responsive: true,
                "order": [],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json" // Fichier de langue français pour DataTables
                },
                "buttons": [
                    'copy', 'excel', 'pdf' // Boutons d'export disponibles
                ]
            });
            //var table = $('#example').DataTable({  responsive: true, "order": [] });

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function() {
                table.draw();
            });
        });
    </script>
    @livewireScripts
    @yield('script')

</body>

</html>
