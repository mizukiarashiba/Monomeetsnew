@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->meetsid, 500) }}" alt="">
                </div>
            </div>
             <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_monos }}</span></a></li>
            
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
               
               <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Favoritings <span class="badge">{{ $count_favoritings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/wantings') ? 'active' : '' }}"><a href="{{ route('users.wantings', ['id' => $user->id]) }}">Wants<span class="badge">{{ $count_wantings }}</span></a></li>
　              <li role="presentation" class="{{ Request::is('users/*/wanters') ? 'active' : '' }}"><a href="{{ route('users.wanters', ['id' => $user->id]) }}">Requested<span class="badge">{{ $count_wanters }}</span></a></li>
            </ul>
            
            
            
            @if(count($monos) > 0)
                @include('monos.monos', ['monos' => $monos])
            @endif
        </div>
    </div>
@endsection