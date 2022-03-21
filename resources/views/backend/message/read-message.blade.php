@extends('backend.layouts.app')
@section('page')
    Lire Message
@endsection
@section('content')
<section class="content">
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
                @if ($message->count() > 0)
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="{{ route('message') }}" class="nav-link">
                                    <i class="fas fa-inbox"></i> Boîte de réception
                                    <span class="badge bg-primary float-right">{{ $message->where('lu',null)->count() }}</span>
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
                            <h6>De: Opérateur 0
                            <span class="mailbox-read-time float-right">{{ $msg->created_at }}</span></h6>
                        </div>
                        
                        <div class="mailbox-read-message">
                            <p>Salut ! {{ $user->nom }},</p>
                            <p>{{$msg->audio}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                @endforeach
            </div>
        </div>
</section>
@endsection

@section('javascripts')

@endsection