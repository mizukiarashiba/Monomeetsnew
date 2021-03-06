@extends('layouts.app')

@section('content')
    <div class="row">
        
        
            @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'posts.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('saying', old('saying'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
       
    </div>
@endsection