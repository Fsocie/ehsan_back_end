<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
    @if ($compter->count() > 0)
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge bg-danger navbar-badge chat">{{ $compter->where('lu',null)->count() }}</span>
        </a>
    @endif
    
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right commande-messages">  
        @if (is_array($messageNotification) || is_object($messageNotification))
            @foreach ($messageNotification as $msg)
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
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ date('d-m-Y', strtotime($msg->created_at)) }}</p>
                                        </div> 
                                    </b>
                                @else
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{ $msg->nom }}
                                        </h3>
                                        <p class="text-sm">{{ $msg->audio }}</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ date('d-m-Y', strtotime($msg->created_at)) }}</p>
                                    </div> 
                                @endif       
                        </div>
                    </a>
                @endif
            @endforeach
        @endif      
        <div class="dropdown-divider"></div>
        <a href="{{ route('message') }}" class="dropdown-item dropdown-footer">Tous les messages</a>
    </div>
</li>

