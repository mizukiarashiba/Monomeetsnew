@if (Auth::user()->is_wanting($mono->id))
        {!! Form::open(['route' => ['mono.unwant', $mono->id], 'method' => 'delete']) !!}
            {!! Form::submit('いらないってしつこいな', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['mono.want', $mono->id]]) !!}
            {!! Form::submit('めちゃほしい', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif