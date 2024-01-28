@extends('base')

@section('title', $property->title)

@section('content')

    <div class="container mt-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>

        <hr>

        <div class="mt-4">
            <h4>{{ __('Interested in this property?') }}</h4>

            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['className' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('shared.input', ['className' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                </div>
                <div class="row">
                    @include('shared.input', ['className' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('shared.input', ['type' => 'email', 'className' => 'col', 'name' => 'email', 'label' => 'Email'])
                </div>

                @include('shared.input', ['type' => 'textarea', 'name' => 'message', 'label' => 'Votre message'])

                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussée'  }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }}<br>
                                {{ $property->postal_code }} {{ $property->city }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    Spécificités
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">
                                {{ $option->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection