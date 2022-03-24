@extends('backend.layouts.app')

	@section('page')
	 code Qr
	@endsection



	@section('content')

    <section class="content">
        <div class="container-fluid">
             <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        {{ $message }}
                    </div>
                    @endif
                </div>
                {{--{{dd($enfant)}}--}}
                {{--{{dd($enfant->qrcode)}}--}}
            </div>

            <div class="row">
              
                <img src="/codes-qr/junior.svg" alt="" srcset="">
                    <div class="col-md-6">    {!! $qrcode !!}ok</div>
                   
            </div>
        </div>

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
