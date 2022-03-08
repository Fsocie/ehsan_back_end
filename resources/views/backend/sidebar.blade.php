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

             <li class="nav-item">
                  <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                      Accueil
                      <span class="right badge badge-danger commandes"></span>
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('admin.signal.index')}}" class="nav-link">
                    <i class="fab fa-shopify"></i>

                    <p>

                       Listes des cas signalés
                      <span class="right badge badge-danger commandes"></span>
                    </p>
                  </a>
                </li>


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
                <a href="{{route('admin.qrcode.index')}}" class="nav-link">
                      <i class="fa fa-cubes"></i>
                    <p>
                    Enfants & code Qr
                      <span class="right badge badge-danger "></span>
                    </p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <p>
                      Messages
                      <span class="right badge badge-danger messages"></span>
                    </p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <p>
                      Lancer une collecte
                      <span class="right badge badge-danger messages"></span>
                    </p>
                  </a>
                </li>




                  <li class="nav-item" >
                      <a href="{{route('admin.paramatre.index')}}" class="nav-link" >
                      <i class="fas fa-cog">



                      </i> Paramètre
                      </a>

                  </li>










      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
