@extends('base')

@section('title', 'Se connecter')

@section('content')
    <div class="mt-4 container">
        <h1>@yield('title')</h1>

        @include('shared.flash')

        <form method="post" action="{{ route('login') }}" class="vstack gap-3">
            @csrf

            @include('shared.input', ['name' => 'email', 'type' => 'email', 'label' => 'Email', 'className' => 'col'])
            @include('shared.input', ['name' => 'password', 'type' => 'password', 'label' => 'Mot de passe', 'className' => 'col'])

            <div>
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
@endsection
