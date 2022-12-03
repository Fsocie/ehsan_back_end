<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('admin/dist/img/logo-icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Ehsan Afrique </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             @role('Admin')
             <li class="nav-header">ADMINISTRATEURS</li>
                <li class="nav-item">
                  <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                      Accueil
                      <span class="right badge badge-danger commandes"></span>
                    </p>
                  </a>
                </li>
                <li class="nav-item" >
                  <a href="{{route('users.index')}}" class="nav-link" >
                    <i class="fas fa-users"></i> <p>Liste des administrateurs<span class="right badge badge-danger messages"></span></p>
                  </a>
                </li>
                <li class="nav-item" >
                  <a href="{{route('agents.liste')}}" class="nav-link" >
                    <i class="fas fa-users"></i> <p>Liste des Agents<span class="right badge badge-danger messages"></span></p>
                  </a>
                </li>
                <li class="nav-item" >
                  <a href="{{route('utilisateurs.liste')}}" class="nav-link" >
                    <i class="fas fa-users"></i> <p>Liste des utilisateurs<span class="right badge badge-danger messages"></span></p>
                  </a>
                </li>

                <!--<li class="nav-item">
                  <a href="{{route('admin.signal.index')}}" class="nav-link">
                    <i class="fab fa-shopify"></i>

                    <p>

                       Listes des cas signalés
                      <span class="right badge badge-danger commandes"></span>
                    </p>
                  </a>
                </li>-->

                  
                  <li class="nav-item">
                    <a href="{{route('admin.carnet.index')}}" class="nav-link">
                      <i class="fas fa-users"></i>
                      <p>
                      Utilisateurs & Carnets
                        <span class="right badge badge-danger"></span>
                      </p>
                    </a>
                  </li>
                
                <li class="nav-item">
                  <a href="{{route('admin.qrcode.joi')}}" class="nav-link">
                      <i class="fa fa-qrcode"></i>
                    <p>
                    Enfants & code Qr
                      <span class="right badge badge-danger "></span>
                    </p>
                  </a>
                </li>
                


                <!--<li class="nav-item">
                  <a href="{{ route('message') }}" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <p>
                      Messages 
                      <span class="right badge badge-danger messages"></span>
                    </p>
                  </a>
                </li>-->

                 {{-- collecte begin --}}
                 @can('collecte-list')
                 <li class="nav-item">
                   <a href="{{route("admin.collectes.index")}}" class="nav-link">
                     <i class="fas fa-dice"></i>
                     <p>Lancer une collecte<span class="right badge badge-danger messages"></span>
                     </p>
                   </a>
                 </li>
                 @endcan
                  {{-- collecte begin pizza-slice--}}
                  <!--<li class="nav-item">
                    <a href="{{ route('whatsapp.index')}}" target="_top" class="nav-link">
                      <i class="fas fa-pizza-slice"></i>
                      <p>WhatsApp<span class="right badge badge-danger messages"></span></p>
                    </a>
                  </li>-->
                 {{-- collecte begin --}}
                 
                  {{-- parametre begin --}}
                    @can('parametre-list')
                      <li class="nav-item" >
                          <a href="{{route('admin.paramatre.index')}}" class="nav-link" >
                          <i class="fas fa-cog"></i> <p>Paramètre<span class="right badge badge-danger messages"></span>
                          </p>
                          </a>
                      </li>
                    @endcan
                    {{-- parametre end --}}
                  @endrole

                  @role('Agent')
                    <li class="nav-header">AGENTS DE TERRAIN</li>
                      <li class="nav-item" >
                          <a href="{{route('admin.beneficiare.view')}}" class="nav-link" >
                            <i class="fas fa-users"></i> <p>Enregistrer Parent<span class="right badge badge-danger messages"></span></p>
                          </a>
                      </li>
                      <li class="nav-item" >
                        <a href="{{route('admin.formulaire.ajoutEnfant')}}" class="nav-link" >
                          <i class="fas fa-users"></i> <p>Enregistrer Enfant<span class="right badge badge-danger messages"></span></p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.qrcode.joi')}}" class="nav-link">
                            <i class="fa fa-qrcode"></i>
                          <p>Liste des Enfants<span class="right badge badge-danger "></span></p>
                        </a>
                      </li>
                      <li class="nav-item" >
                        <a href="{{route('admin.user.listeBeneficiaire')}}" class="nav-link" >
                          <i class="fas fa-users"></i> <p>Liste des Parents<span class="right badge badge-danger messages"></span></p>
                        </a>
                      </li>
                    @endrole
               









      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
