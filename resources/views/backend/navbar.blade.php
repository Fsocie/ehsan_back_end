<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Dashbord</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge chat"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right commande-messages">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('admin/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('admin/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge commande-notification"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right commande-clientele">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <div class="content">
        <!-- <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div> -->
        </div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>


    <li class="nav-item dropdown open" style="padding-left: 15px;">

        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
             <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </a>
        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

              <a class="dropdown-item"  href=""> <i class="fas fa-user "></i> Profils</a>

              <a class="dropdown-item"  href="javascript:;">   <i class="fas fa-question-circle"></i> Aide</a>
              <a class="dropdown-item" href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt "></i>  Deconnexion </a>
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
              <a href="" class="nav-link"><i class="fas fa-tools"> </i>Paramètres</a>
        </div>
    </li>



  </ul>
</nav>
<!-- /.navbar -->
