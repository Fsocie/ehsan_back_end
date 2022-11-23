
@extends('backend.layouts.app')

@section('page')
    Carnet Utilisateur
@endsection



@section('content')

<section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Maladies & allergies</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"></span>
                  <h3 class="timeline-header"><a href="#">Antécédents</a></h3>

                  <div class="timeline-body">
                   {{$carnet->antecedent}}
                  </div>

                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"></span>
                  <h3 class="timeline-header no-border"><a href="#">Allergie</a> </h3>

                  <div class="timeline-body">
                   {{$carnet->allergie}}
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"></span>
                  <h3 class="timeline-header"><a href="#">Maladies</a> </h3>
                  <div class="timeline-body">
                  {{$carnet->maladie}}
                  </div>

                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">Corpulence</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"></span>
                  <h3 class="timeline-header"><a href="#">Poids</a></h3>
                  <div class="timeline-body">
                  {{$carnet->poids}}
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-video bg-maroon"></i>

                <div class="timeline-item">
                  <span class="time"></span>

                  <h3 class="timeline-header"><a href="#">Taille</a> </h3>

                  <div class="timeline-body">
                    <div class="timeline-body">
                     {{$carnet->taille}}
                </div>
                  </div>

                </div>
              </div>

              <div>
                <i class="fas fa-video bg-maroon"></i>

                <div class="timeline-item">
                  <span class="time"></span>

                  <h3 class="timeline-header"><a href="#">Groupe</a> </h3>

                  <div class="timeline-body">
                    <div class="timeline-body">
                     {{$carnet->groupe}}
                    </div>
                  </div>

                </div>
              </div>
              <div>
                <i class="fas fa-video bg-maroon"></i>

                <div class="timeline-item">
                  <span class="time"></span>

                  <h3 class="timeline-header"><a href="#">Sexe</a> </h3>

                  <div class="timeline-body">
                    <div class="timeline-body">
                     {{$carnet->sexe}}
                </div>
                  </div>

                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>

                <div class="timeline-item">
                  <span class="time"></span>

                  <h3 class="timeline-header"><a href="#">Créé Le </a> </h3>

                  <div class="timeline-body">
                    <div class="timeline-body">
                     {{$carnet->created_at}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>

    @endsection

    @section('javascripts')

        <script type="text/javascript">
            $(document).ready(function(){

                $("#listLots").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
            })
            function setLotId(id) {

                $('#lot_id').val(id);
            }

            $(document).ready(function(){

                $("#dataUsers").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            })
        </script>

    @endsection
