@extends('backend.layouts.app')

	@section('page')
		dashbord
	@endsection

	@section('content')

		    <!-- Info boxes -->
          <div class="row">
              <div class="col-12 col-sm-4 col-md-4s">
                <div class="info-box">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                  <div class="info-box-content">
                    <a href="">
                    <span class="info-box-text">Utilisateurs</span>
                    <span class="info-box-number">
                    {{count($users)}}

                    </span>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->


              <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                  <div class="info-box-content">
                    <a href=" ">
                    <span class="info-box-text">Cas signalé</span>
                    <span class="info-box-number"> {{count($cas)}} </span>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-spinner"></i></span>

                  <div class="info-box-content">
                    <a href="">
                    <span class="info-box-text">Cas traité </span>
                    <span class="info-box-number"> </span>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->



              <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-currency"></i></span>

                  <div class="info-box-content">
                    <a href="">
                    <span class="info-box-text">Fond collecté (XOF) </span>
                    <span class="info-box-number"> </span>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              
              <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-currency"></i></span>

                  <div class="info-box-content">
                    <a href="">
                      <span class="info-box-text">Transaction totale (XOF) </span>
                      <span class="info-box-number"> {{$transactions}} </span>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            

          </div>
        <!-- /.row -->
        <!-- /.col -->
          </div>

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">



              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">10 derniers Cas Signalé</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                  <div class="table-responsive">
                  @foreach($cas as $cas)
                    <table id="listCommande" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>Id</th>
                        <th>Utilisateurs</th>
                        <th>Cas signalé</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>


                      <tr>
                        <th>
                        {{ $cas->id }}
                          </th>
                          <th>
                            <a href="">
                            {{ $cas->user->nom }} |   {{ $cas->user->prenoms }}
                          </a>
                          </th>
                          <th>
                                {{ $cas->libelle }}
                          </th>
                          <th>
                            <div class="btn-group">
                            <a type="button" class="btn btn-primary" href="" ><i class=" fas fa-newspaper"></i></a>

                            <a type="button" class="btn btn-success" href="" title="Détails"><i class="nav-icon fas fa-eye"></i></a>


                                          </div>
                          </th>
                      </tr>

                      </tbody>
                    </table>
                   @endforeach
                  </div>

                </div>

              </div>

            </div>


            <div class="col-md-4">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Derniers messages 
                    <span class="badge bg-primary float-right">{{ $compter->where('lu',null)->count() }}</span>
                  </h3>
                  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">

                    <li class="item">
                      @foreach ($message as $msg)
                        @if ($msg->lu == '')
                            <a href="{{ route('rm', ['contact_id'=>$msg->id]) }} " class="dropdown-item">
                                <div class="media">           
                                    <img src="{{ asset('admin/dist/img/default.jpg') }}" alt="{{ $msg->nom }}" class="img-size-50 mr-3 img-circle">
                                        @if ($msg->lu == '')
                                            <b>
                                                <div class="media-body">
                                                    <h3 class="dropdown-item-title">
                                                        {{ $msg->nom }}
                                                    </h3>
                                                    <p class="text-sm">{{ $msg->audio }}</p>
                                                    
                                                </div> 
                                            </b>
                                        @else
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    {{ $msg->nom }}
                                                </h3>
                                                <p class="text-sm">{{ $msg->audio }}</p>
                                                
                                            </div> 
                                        @endif       
                                </div>
                            </a>
                        @endif
                      @endforeach
                    </li>

                  </ul>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listes des derniers Utilisateurs inscrit </h3>
                </div>
                <!-- /.card-header -->
               <div class="card-body ">
                  <div class="table-responsive">

                    <table id="listCommande" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>Nom</th>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>

                      @foreach($users as $user)
                      <tr>
                        <th>
                        {{ $user->nom }} |   {{ $user->prenoms }}
                       </th>


                          <th>
                          {{ $user->telephone }}
                          </th>
                          <th>
                          {{ date('d-m-Y', strtotime($user->created_at)) }}
                         </th>

                          <th>

                              <div class="btn-group">

                                    <a type="button" class="btn btn-success" href="" title="Détails"><i class="nav-icon fas fa-eye"></i></a>

                              </div>

                          </th>
                      </tr>

                      </tbody>
                      @endforeach
                    </table>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          
          <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Listes des transactions journalière</h3>
                </div>
                <!-- /.card-header -->
            <div class="card-body ">
                <div class="table-responsive">

                    <table id="listCommande" class="table table-bordered table-striped">
                    <thead>

                    <tr>
                        <th>Nom</th>
                        <th>Montant</th>
                        <th>Mode de paiement</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($transactionsJours as $transactionsJour)
                    <tr>
                        <th>
                            {{ $transactionsJour->nom }} |   {{ $transactionsJour->prenoms }}
                        </th>
                        <th>
                            {{ $transactionsJour->montant }}
                        </th>
                        <th>
                            {{ $transactionsJour->mode_paiement }}
                        </th>
                        <th>
                            {{ $transactionsJour->telephone }}
                        </th>
                        <th>
                            {{ date('d-m-Y', strtotime($transactionsJour->created_at)) }}
                        </th>
                    </tr>

                    </tbody>
                    @endforeach
                    </table>

                </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
	@endsection

  @section('javascripts')
      <script>
        $(document).ready(function(){

              $("#listCommande,listUtilisateur").DataTable({
                "responsive": true,
                "autoWidth": false,
              });
      })

      </script>

  @endsection
