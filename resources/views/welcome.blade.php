@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('users.show')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Monomeets</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection


<link type="text/css" rel="stylesheet" href="css/welcome.css" />