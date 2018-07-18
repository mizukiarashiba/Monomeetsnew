<ul class="panel-list">
@foreach ($monos as $mono)
    <?php $user =   $mono->user; ?>
    <class="panel">
        
        <div class="panel-header">
              {!! link_to_route('monos.monopage', $mono->title, ['id' => $mono->id]) !!}
        </div>
            
            <img class="media-object img-rounded img-responsive" src="{{ asset('storage/images/' . $mono->group_picture) }}" alt="写真を挿入">
           
        <div class="panel-body">
            
        </div>
        
        <div class="panel-footer">
           　　　 @include ('mono_favorite.favorite_button', ['monos' => $monos])
           　　　  @include ('mono_want.want_button', ['user' => $user])
        </div>
        
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $mono->created_at }}</span>
            </div>
            
            <div>
                 
                
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