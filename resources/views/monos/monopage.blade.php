@extends('layouts.app')

@section('content')

@foreach ($monos as $mono)
 <?php $user =   $mono->user; ?>
    <class="panel">
        
        <div class="panel-header">
             <h1><?php echo("$mono->title");
             ?></h1>
             
        </div>
        
        
        
        <img class="media-object img-rounded img-responsive" src="{{ asset('storage/images/' . $mono->group_picture) }}" alt="写真を挿入">
        
        <div class="panel-body">
             <h2><?php echo("$mono->content");
             ?></h2>
        
        
       
            
            
             @if (Auth::user()->is_favoriting($mono->id))
        {!! Form::open(['route' => ['user.unfavorite', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $mono->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
    <br>
    
    <!-- リクエスト用フォーム　いろいろ作る　-->
            @if (Auth::id() != $user->id)  
    @if (Auth::user()->is_wanting($user->id))
        {!! Form::open(['route' => ['mono.unwant', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('やっぱいらん♪', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['mono.want', $mono->id]]) !!}
            {!! Form::submit('めっちゃ欲しい💦', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
　　@endif

        </div>
        
        {!! link_to_route('users.chat', 'Chat', ['id' => $user->id]) !!}
 
 
   
            
            
@endforeach


@endsection
