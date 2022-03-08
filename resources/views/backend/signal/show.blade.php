@extends('backend.layouts.app')

	@section('page')
		utilisateurs
	@endsection

	@section('content')

	<section class="content">
      	<div class="container-fluid">
	        <div class="row">
	          	<div class="col-12">

		            <div class="callout callout-info">
                    <h5>Titre : {{ $signal->libelle}}</h5>
                        <div class="col-12  d-flex ">
                        <div style="width: 100%">
                        <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+{{ $signal->latitude}}+,+{{ $signal->longitude}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="600" frameborder="0"><a href="https://www.gps.ie/car-satnav-gps/">car navigation systems</a></iframe></div>



                        </div>
                     </div>



					<section class="content">
	        			<div class="container-fluid">


				          	<!-- Info boxes -->
				          	<div class="row">

					            <div class="col-12 col-sm-4 col-md-4">
					                <div class="info-box">
					                  	<span class="info-box-icon bg-info elevation-1">
					                  		<i class="fas fa-cog"></i>
					                  	</span>

					                  	<div class="info-box-content">

					                    	<span class="info-box-text">Sign. en cours de vérification</span>

					                    	<span class="info-box-number">

					                    	</span>

					                  	</div>
					                </div>
					            </div>



					            <div class="col-12 col-sm-4 col-md-4">
					                <div class="info-box">
					                  	<span class="info-box-icon bg-success elevation-1">
					                  		<i class="fas fa-spinner"></i>
					                  	</span>

					                  	<div class="info-box-content">
					                    	<span class="info-box-text">Sign. en cours de traitement</span>
					                    	<span class="info-box-number">	</span>
					                  	</div>
					                  <!-- /.info-box-content -->
					                </div>
					                <!-- /.info-box -->
					            </div>


					            <div class="col-12 col-sm-4 col-md-4">
					                <div class="info-box">
					                  	<span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-check-square"></i></span>

					                  	<div class="info-box-content">
					                    	<span class="info-box-text"> Sign. traité </span>
										  	<span class="info-box-number"> </span>
					                  	</div>
					                </div>
					            </div>







				          	</div>
	        			</div>
	      			</section>

		  			<section>


					  	<div class="row">
				          	<div class="col-md-4">
				            	<div class="card card-widget widget-user-2">

									<div class="widget-user-header bg-secondary">
										<div class="widget-user-image">
											<img class="img-circle elevation-2" src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" alt="User Avatar">
										</div>
											<!-- /.widget-user-image -->

										<h3 class="widget-user-username">
                                        {{ $signal->user->nom }} {{ $signal->user->prenoms }}
										</h3>

										<h5 class="widget-user-desc">
                                        {{ $signal->user->profession }}
										</h5>
									</div>

									<div class="card-footer p-0">
										<ul class="nav flex-column">
											<li class="nav-item">
												<a href="#" class="nav-link">
												Numéro de téléphone <span class="float-right badge bg-primary">{{ $signal->user->telephone }} </span>
												</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
												Email <span class="float-right badge bg-primary">{{ $signal->user->email }}  </span>
												</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
												Pays <span class="float-right badge bg-primary"> {{ $signal->user->pays->nom }}  </span>
												</a>
											</li>
											<li class="nav-item">

												<a href="" class="nav-link">
											  Nombre d'enfant <span class="float-right badge bg-primary"> {{ $signal->user->date_naissance }}  </span>
												</a>
											</li>

										</ul>
									</div>
								</div>
							</div>

							<div class="card-body col-md-8 card">

								<center><strong>LISTES DES CAS SIGNALES</strong></center>
								<table id="listAffilies" class="table table-bordered table-striped">
									<thead>
										<tr>
                                                 <th>No</th>
                                                 <th>Libelle</th>
                                                <th>Continent</th>
                                                <th>Pays </th>
                                                <th>Zone </th>


                                                <th>Date </th>

                                                <th>Action</th>
										</tr>
									</thead>

									<tbody>
                                    @php ($i = 0)
                                @foreach($all as $all)

                                    <tr >

                                        <th>
                                            {{ ++$i }}
                                        </th>
                                        <th >
                                            {{$all->libelle}}
                                        </th>
                                        <th>
                                            {{$all->continent}}
                                        </th>
                                        <th>
                                            {{$all->pays}}
                                        </th>
                                        <th>
                                            {{$all->zone}}
                                        </th>



                                        <th>
                                            {{$all->created_at}}
                                        </th>


                                        <th>

                                            <div class="btn-group">

                                                  <a type="button" class="btn btn-warning" href="{{ route('admin.signal.show', $all->id) }}" title="Détails" ><i class="nav-icon fas fa-edit"></i></a>


                                             </div>

                                        </th>

                                    </tr>

                                @endforeach
									</tbody>
								</table>
							</div>
						</div>


		  			</section>


                    <section>


							<div class="card-body col-md-12 card">

                                <center><strong>LISTES DES ENFANTS</strong></center>
                                <table id="listAffilies" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nom</th>
                                        <th>prenom</th>
                                        <th>Date Naissance </th>
                                        <th>description </th>


                                        <th>photo</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @php ($i = 0)
                                @foreach($child as $child)

                                            <tr>
                                                <th>
                                                {{ ++$i }}
                                                </th>
                                                <th>
                                                {{$child->nom}}
                                                </th>
                                                <th>
                                                {{$child->prenom}}
                                                </th>
                                                <th>
                                                {{$child->date_naissance}}
                                                </th>

                                                <th>

                                                {{$child->description}}
                                                </th>
                                                <th>
                                                <img class="img-circle elevation-2" src="https://app.ehsan.com.nerdtic.com/storage/img/photo/{{$child->photo}}"   width="50" height="50">


                                                </th>

                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>

                    </section>



	          	</div><!-- /.col -->
	        </div><!-- /.row -->

			<!-- ajoute du portefeuille-->


    </section>

	@endsection
	@section('javascripts')

	    <script>

	    	$(document).ready(function(){

	            $("#listAffilies, #listCommande").DataTable({
	              "responsive": true,
	              "autoWidth": false,
	            });
			})

			function displayAdressForm() {

				if ($("#a_livraison" ).val() == 2)
					$("#adressForm").show();
				else
					$("#adressForm").hide();
			}
	    </script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGl-QLS5oZ-pLpRGufyG0H22tjX6bZ7WI&callback=initMap"
		async defer></script>




	@endsection

