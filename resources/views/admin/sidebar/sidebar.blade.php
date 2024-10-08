<!-- [ Layout sidenav ] Start -->
<div style =" z-index: 2;" id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-custom-color ">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo ">
        <span class=" demo ">
            <img width="60" src="{{ asset('assets/images/logo-ena.PNG') }}" alt="Brand Logo" class="img-fluid">
        </span>
        {{-- <a href="#" class="app-brand-text demo sidenav-text font-weight-normal ml-2"
            style="color: white;">{{ Auth::user()->name }}</a> --}}
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"style="color: white;"></i>
        </a>
    </div>

    {{-- <div class="sidenav-divider mt-0 " style="margin-top: -29px !important"></div> --}}
    <div class="sidenav-divider mt-0 " style="border-color: white !important;"></div>


    <!-- Links -->
    <ul class="sidenav-inner py-1">
        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="{{ route('dashboard') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"style="color: white;"></i>
                <div style="color: white;">Dashboards</div>
                @if (Auth::user()->role_name == 'admin')
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-success">{{ Auth::user()->role_name }}</div>
                    </div>
                @endif
                @if (Auth::user()->role_name == 'Normal User')
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-danger">{{ Auth::user()->role_name }}</div>
                    </div>
                @endif
                @if (Auth::user()->role_name == null)
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-warning">{{ Auth::user()->role_name }} {{ '[N/A]' }}</div>
                    </div>
                @endif
            </a>
        </li>

        <!-- Layouts -->
        {{-- <li class="sidenav-divider mb-1"></li> --}}
        {{-- <li class="sidenav-header small font-weight-semibold">SUIVI</li> --}}

        @if (Auth::user()->role_name == 'admin' || Auth::user()->role_name == 'super_admin')
            <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                    <i class="sidenav-icon feather icon-settings" style="color: white;"></i>
                    <div style="color: white;">PARAMETRE</div>
                </a>

                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                            <i class="sidenav-icon feather icon-user"style="color: white;"></i>
                            <div> Utilisateur</div>
                        </a>

                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('admin/register') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus" style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('admin/users') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                            <i class="sidenav-icon feather icon-users"style="color: white;"></i>
                            <div> Profil</div>
                        </a>

                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('profil/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('profils') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                </ul>
                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            <i class="sidenav-icon feather icon-file-minus"style="color: white;"></i>
                            <div>Types Pieces</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('typepiece/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('typepieces') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            <i class="sidenav-icon feather icon-file-minus"style="color: white;"></i>
                            <div>Pieces</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('piece/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('piece') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endif

        {{-- @if (Auth::user()->role_name == 'etudiant' || Auth::user()->role_name == 'super_admin' || Auth::user()->role_name == 'enseignant')
            <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                    <i class="sidenav-icon feather icon-file"style="color: white;"></i>
                    <div style="color: white;">Demandes</div>
                </a>
                <ul class="sidenav-menu">
                    <li>
                        <a href="{{ route('demandes/new') }}" class="sidenav-link "style="color: white;">
                            <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                            <div>Ajouter</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="{{ route('demandes') }}" class="sidenav-link"style="color: white;">
                            <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                            <div>Liste</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}
        @if (Auth::user()->role_name == 'admin' || Auth::user()->role_name == 'super_admin')
            <li class="sidenav-item active">
                <a href="{{ route('demandes/admin') }}" class="sidenav-link">
                    <i class="sidenav-icon feather icon-file-text" style="color: white;"></i>
                    <div style="color: white;">Liste des Demandes</div>

                </a>
            </li>
        @endif

        {{-- <li class="sidenav-item active">
            <a href="{{ url('user/update/' . auth()->user()->id) }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-user-check" style="color: white;"></i>
                <div style="color: white;">Profil utilisateur</div>

            </a>
        </li> --}}


        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                {{-- <i class="sidenav-icon feather icon-clipboard"></i> --}}
                <i class="sidenav-icon feather icon-settings"style="color: white;"></i>
                <div style="color: white;">Paramètrage</div>
            </a>
              <ul class="sidenav-menu">
                
                <li>
                    <a href="{{ route('salle/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-home"style="color: white;"></i>
                        <div>Salles</div>
                    </a>
                </li>
                <li>
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('typeactivite/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-activity"style="color: white;"></i>
                        <div>Types d'activité</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('activite/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-activity"style="color: white;"></i>
                        <div>Activités</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('activite/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-calendar"tyle="color: white;"></i>
                        <div>Périodes</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('anneeacademique/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-calendar"style="color: white;"></i>
                        <div>Années académiques</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('anneeetude/new') }}" class="sidenav-link"style="color: white;">
                        <i class="sidenav-icon feather icon-calendar"style="color: white;"></i>
                        <div>Année Etude</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('groupepeda/new') }}" class="sidenav-link"style="color: white;">
                        <i class="sidenav-icon feather icon-copy"style="color: white;"></i>
                        <div>Groupes Pédagogiques</div>
                    </a>
                </li>
               
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('specialite/new') }}" class="sidenav-link"style="color: white;">
                        <i class="sidenav-icon feather icon-copy"style="color: white;"></i>
                        <div>Spécialité</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidenav-item active">
            <a href="{{ url('user/update/' . auth()->user()->id) }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-user-check" style="color: white;"></i>
                <div style="color: white;">Utilisateurs</div>

            </a>
            <ul class="sidenav-menu">
                <li>
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('salle/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                        <div>Ajouter</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('salles') }}" class="sidenav-link"style="color: white;">
                        <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                        <div>Liste</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                {{-- <i class="sidenav-icon feather icon-clipboard"></i> --}}
                <i class="sidenav-icon feather icon-file"style="color: white;"></i>
                <div style="color: white;">Programmation</div>
            </a>
            <ul class="sidenav-menu">
                <li>
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('programmation/new') }}" class="sidenav-link "style="color: white;">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                        <div>Créer une Programmation</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{ route('programmations') }}" class="sidenav-link"style="color: white;">
                        <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                        <div>Afficher les Programmations</div>
                    </a>
                </li>
            </ul>
        </li>
  
    </ul>
</div>
<!-- [ Layout sidenav ] End -->
<style>
    .bg-custom-color {
        /* background-color: #003679; */
        background: linear-gradient(to bottom, #278d27, #014f01);
        /* Dégradé du haut vers le bas */
    }

    .sidenav-divider {
        border-color: white !important;
        width: 100%;
        /* Pour occuper toute la largeur */
        margin: 0;
        /* Enlever les marges éventuelles */
        border-width: 1px;
        /* Ajuster l'épaisseur de la ligne si nécessaire */
    }
</style>
