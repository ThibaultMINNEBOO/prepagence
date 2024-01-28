@extends('base')

@section('title', 'Accueil')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Lorem Ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio dolorem, explicabo fugit impedit laboriosam quo repudiandae similique soluta temporibus! A aspernatur at dolorem ipsam maxime qui saepe sequi vitae!</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>

        <div class="row">

            @foreach($properties as $property)
            <div class="col">
                @include('properties.card')
            </div>
            @endforeach
        </div>
    </div>

@endsection
