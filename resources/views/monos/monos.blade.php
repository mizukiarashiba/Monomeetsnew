<ul class="media-list">
@foreach ($monos as $mono)
    <?php $user = $mono->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $mono->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($mono->content)) !!}</p>
            </div>
            <div>
                  
                @include ('mono_favorite.favorite_button', ['monos' => $monos])
                
                @if (Auth::id() == $mono->user_id)
                    {!! Form::open(['route' => ['monos.destroy', $mono->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $monos->render() !!}