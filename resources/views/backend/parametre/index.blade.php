@extends('backend.layouts.app')

	@section('page')
		paramètre
	@endsection

	@section('content')

           <div class="row">
                <div class="col-12 col-sm-4 col-md-4s">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-flag"></i></span>

                            <div class="info-box-content">
                                    <a href="{{route('admin.pays.index')}}">
                                    <span class="info-box-text">Ajouter Pays</span>
                                    <span class="info-box-number">


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
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                                <a href="">
                                <span class="info-box-text">Ajouter un type de cas</span>
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
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content" id="iddiv">
                                <a href="#">
                                <span class="info-box-text">Listes des transactions</span>
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
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                    <a href="{{route('users.index')}}">
                                    <span class="info-box-text">Listes des utilisateurs </span>
                                    <span class="info-box-number"> </span>
                                    </a>
                            </div>
                                <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                </div>  


                <div class="col-12 col-sm-4 col-md-4">
                    <div class="info-box mb-3">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-lock"></i></span>
    
                        <div class="info-box-content">
                                <a href="{{route('roles.index')}}">
                                <span class="info-box-text">Listes des roles  </span>
                                <span class="info-box-number"> </span>
                                </a>
                        </div>
                             <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
              </div>

            

          </div>

        
            <div class="row" id="iddiv2" style="display: none">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Listes des transactions</h3>
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

                        @foreach($transactions as $transaction)
                        <tr>
                            <th>
                                {{ $transaction->nom }} |   {{ $transaction->prenoms }}
                            </th>
                            <th>
                                {{ $transaction->montant }}
                            </th>
                            <th>
                                {{ $transaction->mode_paiement }}
                            </th>
                            <th>
                                {{ $transaction->telephone }}
                            </th>
                            <th>
                                {{ date('d-m-Y', strtotime($transaction->created_at)) }}
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

    let iddiv = document.getElementById("iddiv");
    let iddiv2 = document.getElementById("iddiv2");

    iddiv.addEventListener("click", () => {
        if(getComputedStyle(iddiv2).display != "none"){
            iddiv2.style.display = "none";
        } else {
            iddiv2.style.display = "block";
        }
    })

    </script>

@endsection
