<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge chat"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right commande-messages">  
        @if (is_array($message) || is_object($message))
            @foreach ($message as $msg)
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
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $msg->created_at }}</p>
                                        </div> 
                                    </b>
                                @else
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{ $msg->nom }}
                                        </h3>
                                        <p class="text-sm">{{ $msg->audio }}</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $msg->created_at }}</p>
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


<!-- Notifications Dropdown Menu -->
@if (is_array($message) || is_object($message))
    @if ($message->count() > 0)
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"> 
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge commande-notification"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right commande-clientele">
                <span class="dropdown-item dropdown-header">{{ $message->where('lu',null)->count() }} Notifications</span>
                <div class="dropdown-divider"></div>
                <div class="content">
                
                </div>
                <a href="#" class="dropdown-item dropdown-footer">Tous les Notifications</a>
            </div>
        </li>
    @endif
@endif
