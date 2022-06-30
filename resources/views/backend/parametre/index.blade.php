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
                        <div class="card-body table-responsive p-0">
                            <table id="records" style="width:100%" class="table table-hover text-nowrap">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="start_date" placeholder="Date Début" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="end_date" placeholder="Date Fin" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input id="filter" class="btn btn-primary" value="Filtrer" type="button"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <input id="reset" class="btn btn-primary reset" value="Réinitialiser" type="button"/>   
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Montant</th>
                                        <th>Mode de paiement</th>
                                        <th>Téléphone</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endsection

    @section('javascripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    
    <script>
    let iddiv = document.getElementById("iddiv");
    let iddiv2 = document.getElementById("iddiv2");

    iddiv.addEventListener("click", () => {
        if(getComputedStyle(iddiv2).display != "none"){
            iddiv2.style.display = "none";
        } else {
            iddiv2.style.display = "block";
        }
    });
    $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });
        // Fetch records
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('admin.paramatre.records') }}",
                type: "GEt",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.filtres,
                        // buttons
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        // responsive
                        "responsive": true,
                        "columns": [
                            {
                                "data": "nom"
                            },
                            {
                                "data": "montant",
                            },
                            {
                                "data": "mode_paiement",
                            },
                            {
                                "data": "telephone"
                            },
                            {
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Les deux dates sont requises");
            } else {
                $('#records').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch();
        });
    </script>

@endsection
