@extends('backend.layouts.app')
@section('page')
    Message
@endsection
@section('content')    
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="btn btn-primary btn-block mb-3">Compose</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dossiers</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    @if ($compter->count() > 0)
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="{{ route('message') }}" class="nav-link">
                                        <i class="fas fa-inbox"></i> Boîte de réception
                                        <span class="badge bg-primary float-right">{{ $compter->where('lu',null)->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt"></i> Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Boîte de réception</h3>
                        <div class="card-tools">
                            <form action="{{ route('message.recherche') }}" class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Trouver ..." name="q">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            @if ($message->count() > 0)
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        @foreach ($message as $msg)
                                        <tr>
                                            <td class="mailbox-name"><a href="{{ route('rm', ['contact_id'=>$msg->id]) }} ">{{ $msg->nom }}</a></td>
                                            @if ($msg->lu == '')
                                                <td class="mailbox-subject"><b>Message Ehsan Afrique</b> - <b>{{ $msg->audio }}</b></td>
                                            @else
                                                <td class="mailbox-subject"> Message Ehsan Afrique - {{ $msg->audio }}</td>
                                            @endif                                            
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{ $msg->created_at }}</td>
                                        </tr>
                                        @endforeach                        
                                    </tbody>
                                </table>
                            @else
                                <h5><p style="padding-top: 30px; text-align: center;">Aucun nouveau message</p></h5>
                            @endif                            
                        </div>
                    </div>
                    <div class="card-footer p-0">  
                                        
                    </div>
                </div>           
        </div>        
    </section>

@endsection
@section('javascripts')
    <script>
        $(function () {
        //Enable check and uncheck all functionality
        $('.checkbox-toggle').click(function () {
            var clicks = $(this).data('clicks')
            if (clicks) {
            //Uncheck all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
            $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
            //Check all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
            $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })
    
        //Handle starring for glyphicon and font awesome
        $('.mailbox-star').click(function (e) {
            e.preventDefault()
            //detect type
            var $this = $(this).find('a > i')
            var glyph = $this.hasClass('glyphicon')
            var fa    = $this.hasClass('fa')
    
            //Switch states
            if (glyph) {
            $this.toggleClass('glyphicon-star')
            $this.toggleClass('glyphicon-star-empty')
            }
    
            if (fa) {
            $this.toggleClass('fa-star')
            $this.toggleClass('fa-star-o')
            }
        })
        })
    </script>
@endsection