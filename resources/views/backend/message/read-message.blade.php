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
        #output
        {
            min-height: 40px;
            max-width: 60%;
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
            background: #007bff;
            color: #fff;
            text-shadow: 1px 1px 2px #000000d4;
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
                            <span class="mailbox-read-time float-right">{{ date('d-m-Y', strtotime($msg->created_at)) }}</span></h6>
                        </div>
                        <div id="mailbox-read-message">
                            <p>{{$msg->audio}}</p>
                            <audio controls="" style="vertical-align: middle" src="https://app.ehsan.com.atisarltogo.com/storage/audio/user/{{ $msg->audio }}" type="audio/mp3" controlslist="nodownload" autoplay="autoplay">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        </div>
                        <style>
                            span{
                                cursor: pointer;
                            }
                        </style>
                        <div class="card-body"> 
                            <form action="{{ route('rm-post',['contact_id'=>$msg->id]) }}" class="form-group" enctype="multipart/form-data" id="formulaire">
                                @csrf
                                <div id="userInput" >
                                    <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Entrez votre message" required />
                                    <span class="float-right cliquer" style="max-width: 100%; padding: 1em; max-height: 100%; background: #007bff;" id="span_audio">
                                        <i class="fa fa-microphone"></i>
                                    </span>  
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

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"> <div class="discussion botMessages"> '+data+'</div></div>';
                    $("#mailbox-read-message").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>

    <script>

        var leftchannel = [];
        var rightchannel = [];
        var recorder = null;
        var recordingLength = 0;
        var volume = null;
        var mediaStream = null;
        var sampleRate = 44100;
        var context = null;
        var blob = null;

        $('.cliquer').on("click",function(e) {
            // Initialize recorder
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
            navigator.getUserMedia(
                {
                    audio: true
                },
                function (e) {
                    //console.log("user consent");

                    // creates the audio context
                    window.AudioContext = window.AudioContext || window.webkitAudioContext;
                    context = new AudioContext();

                    // creates an audio node from the microphone incoming stream
                    mediaStream = context.createMediaStreamSource(e);

                    // https://developer.mozilla.org/en-US/docs/Web/API/AudioContext/createScriptProcessor
                    // bufferSize: the onaudioprocess event is called when the buffer is full
                    var bufferSize = 2048;
                    var numberOfInputChannels = 2;
                    var numberOfOutputChannels = 2;
                    if (context.createScriptProcessor) {
                        recorder = context.createScriptProcessor(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                    } else {
                        recorder = context.createJavaScriptNode(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                    }

                    recorder.onaudioprocess = function (e) {
                        leftchannel.push(new Float32Array(e.inputBuffer.getChannelData(0)));
                        rightchannel.push(new Float32Array(e.inputBuffer.getChannelData(1)));
                        recordingLength += bufferSize;
                    }

                    // we connect the recorder
                    mediaStream.connect(recorder);
                    recorder.connect(context.destination);
                },
                function (e) {
                    console.error(e);
                });

        });

        function flattenArray(channelBuffer, recordingLength) {
            var result = new Float32Array(recordingLength);
            var offset = 0;
            for (var i = 0; i < channelBuffer.length; i++) {
                var buffer = channelBuffer[i];
                result.set(buffer, offset);
                offset += buffer.length;
            }
            return result;
        }

        function interleave(leftChannel, rightChannel) {
            var length = leftChannel.length + rightChannel.length;
            var result = new Float32Array(length);

            var inputIndex = 0;

            for (var index = 0; index < length;) {
                result[index++] = leftChannel[inputIndex];
                result[index++] = rightChannel[inputIndex];
                inputIndex++;
            }
            return result;
        }

        function writeUTFBytes(view, offset, string) {
            for (var i = 0; i < string.length; i++) {
                view.setUint8(offset + i, string.charCodeAt(i));
            }
        }
    
    function playAudio() {
        let playAudio = document.getElementById("source");
            if (blob == null) {
                return;
            }
        var url = window.URL.createObjectURL(blob);
        var audio = new Audio(url);
        playAudio.src = url;
    }

    $('.cliquer').on("dblclick",function(e){  
        // stop recording
        recorder.disconnect(context.destination);
        mediaStream.disconnect(recorder);

        // we flat the left and right channels down
        // Float32Array[] => Float32Array
        var leftBuffer = flattenArray(leftchannel, recordingLength);
        var rightBuffer = flattenArray(rightchannel, recordingLength);
        // we interleave both channels together
        // [left[0],right[0],left[1],right[1],...]
        var interleaved = interleave(leftBuffer, rightBuffer);

        // we create our wav file
        var buffer = new ArrayBuffer(44 + interleaved.length * 2);
        var view = new DataView(buffer);

        // RIFF chunk descriptor
        writeUTFBytes(view, 0, 'RIFF');
        view.setUint32(4, 44 + interleaved.length * 2, true);
        writeUTFBytes(view, 8, 'WAVE');
        // FMT sub-chunk
        writeUTFBytes(view, 12, 'fmt ');
        view.setUint32(16, 16, true); // chunkSize
        view.setUint16(20, 1, true); // wFormatTag
        view.setUint16(22, 2, true); // wChannels: stereo (2 channels)
        view.setUint32(24, sampleRate, true); // dwSamplesPerSec
        view.setUint32(28, sampleRate * 4, true); // dwAvgBytesPerSec
        view.setUint16(32, 4, true); // wBlockAlign
        view.setUint16(34, 16, true); // wBitsPerSample
        // data sub-chunk
        writeUTFBytes(view, 36, 'data');
        view.setUint32(40, interleaved.length * 2, true);

        // write the PCM samples
        var index = 44;
        var volume = 1;
        for (var i = 0; i < interleaved.length; i++) {
            view.setInt16(index, interleaved[i] * (0x7FFF * volume), true);
            index += 2;
        }

        // our final blob
        blob = new Blob([view], { type: 'audio/wav' });
        console.log("blob : ",blob);
    });

    $('.cliquer').on("dblclick",function(e){
        e.preventDefault();

        $userVocal = blob;
        console.log("user vocal : ",$userVocal);

        $appendUserVocal = '<div class="discussion usersMessages"><audio controls id="source" type="audio/wav"> Votre navigateur ne supporte pas élément audio.</audio> </div>';
        $("#mailbox-read-message").append($appendUserVocal);
        playAudio();
        console.log("blob2 : ",blob);

        //var formData =$("#span_audio").append("audio_data", blob.files[0]);
        //console.log("forme Data :",formData);

        // ajax start   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            // sending data
            data: {messageValue2: $userVocal},
            // response text
            success: function(data){
                // show response
                $appendBotResponse = '<div id="messagesContainer"> <div class="discussion botMessages"> '+data+'</div></div>';
                $("#mailbox-read-message").append($appendBotResponse);
            },
            error: function (data) {
                alert('Error');
            }
        });
        console.log("forme data : ",formData);
    });

    </script>  
@endsection