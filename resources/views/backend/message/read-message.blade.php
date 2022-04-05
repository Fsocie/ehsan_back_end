@extends('backend.layouts.app')
@section('page')
    Lire Message
@endsection
@section('content')
<section class="content">
    <style>
        *
        {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            box-sizing: border-box;
        }

        #mailbox-read-message
        {                        
            margin: 10px auto;
            border-radius: 20px;                                
            border-radius: 20px;
            border: 15px solid #fff;                                
            position: relative;
            overflow: hidden;
        }
        
        .discussion
        {
            min-height: 40px;
            max-width: 60%;
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
        }
        .botMessages
        {
            background: #007bff;
            color: #fff;
            text-shadow: 1px 1px 2px #000000d4;
        }
        #messagesContainer
        {
            height: auto;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }
        .usersMessages
        {
            background: #00000010;
        }
        #userInput
        {
            height: 50px;
            width: 90%;
            position: absolute;
            left: 5%;
            bottom: 3%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        #messages
        {
            height: 50px;
            width: 90%;
            position: absolute;
            left: 0;
            border: none;
            outline: none;
            background: transparent;
            padding: 0px 15px;
            font-size: 17px;
        }
        #send
        {
            height: 50px;
            width: 24%;
            position: absolute;
            right: 0;
            border: none;
            outline: none;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 20px;
            background: #007bff;
            cursor: pointer;
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('message') }}" class="btn btn-primary btn-block mb-3">Boîte de réception</a>
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
                    <h3 class="card-title">Lire un message</h3>
                </div>
                @foreach ($message as $msg)
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h6>De : {{ $msg->nom }}
                            <span class="mailbox-read-time float-right">{{ $msg->created_at }}</span></h6>
                        </div>
                        <div id="mailbox-read-message">
                            <p>{{$msg->audio}}</p>
                            <audio controls="" style="vertical-align: middle" src="https://app.ehsan.com.atisarltogo.com/storage/audio/user/{{ $msg->audio }}" type="audio/mp3" controlslist="nodownload" autoplay="autoplay">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        </div>
                        <div class="card-body"> 
                            <form action="{{ route('rm-post',['contact_id'=>$msg->id]) }}" class="form-group">
                                
                                <div id="userInput">
                                    <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Entrez votre message" required />  
                                    <input type="submit" value="Send" id="send" name="send" />
                                </div>         
                            </form>                                                         
                        </div>                    
                    <div class="card-footer">
                    </div>
                @endforeach
            </div>
        </div>
</section>
@endsection

@section('javascripts')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
    <!-- Début de Jquery -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="discussion usersMessages">'+ $userMessage +'</div>';
            $("#mailbox-read-message").append($appendUserMessage);
            // ajax start   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });  
            //var layer_id = $(this).data('id');
            //var url = '{{ route("rm-post", ":contact_id") }}';
            //url = url.replace(':contact_id', layer_id );
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="discussion botMessages">'+data+'</div></div>';
                    $("#mailbox-read-message").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>  
@endsection