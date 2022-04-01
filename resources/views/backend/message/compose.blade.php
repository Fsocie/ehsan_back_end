@extends('backend.layouts.app')
@section('page')
    Compose
@endsection
@section('content')    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('message') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox
                                        <span class="badge bg-primary float-right">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-envelope"></i> Sent
                                    </a>
                                </li>                       
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file-alt"></i> Drafts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-filter"></i> Junk
                                        <span class="badge bg-warning float-right">65</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt"></i> Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Labels</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Ecrire un nouveau message</h3>
                        </div>
                        <style>
                            *
                            {
                                padding: 0;
                                margin: 0;
                                font-family: sans-serif;
                                box-sizing: border-box;
                            }
                            
                            #screen
                            {
                                height: 670px;
                                width: 400px;
                                margin: 10px auto;
                                border-radius: 20px;
                                background: #f6f6f6;
                                border-radius: 20px;
                                border: 15px solid #fff;
                                box-shadow: 3px 3px 15px rgba(0,0,0,0.2);
                                position: relative;
                                overflow: hidden;
                            }
                            #header
                            {
                                height: 80px;
                                width: 100%;
                                position: absolute;
                                top: 0;
                                left: 0;
                                background: #007bff;
                                display: grid;
                                place-items: center;
                                font-size: 25px;
                                color: #fff;
                                font-weight: bold;
                                text-shadow: 1px 1px 2px #000000a1;
                            }
                            #messageDisplaySection
                            {
                                height: 450px;
                                width: 100%;
                                position: absolute;
                                left: 0;
                                top: 100px;
                                padding: 0 20px;
                                overflow-y: auto;
                            }
                            .chat
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
                        <div class="card-body"> 
                            <div class="form-group">
                                <div id="screen">
                                    <div id="header">Ehsan Afrique</div>
                                    <div id="messageDisplaySection">
                                        
                                    </div>
                                    <div id="userInput">
                                        <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Entrez votre message" required>
                                        <input type="submit" value="Send" id="send" name="send">
                                    </div>
                                </div>                          
                            </div>                                                         
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascripts')
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
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
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);
            // ajax start    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });                                 
            $.ajax({
                url: '{{ route('composePost') }}',
                type: 'POST',
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>   
@endsection
