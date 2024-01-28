@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Ajouter un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">
            @include('shared.input', ['className' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            <div class="col row">
                @include('shared.input', ['className' => 'col', 'name' => 'surface', 'type' => 'number', 'value' => $property->surface])
                @include('shared.input', ['className' => 'col', 'name' => 'price', 'type' => 'number', 'value' => $property->surface, 'label' => 'Prix'])
            </div>
        </div>

        @include('shared.input', ['name' => 'description', 'value' => $property->description, 'type' => 'textarea', 'label' => 'Description'])

        <div class="row">
            @include('shared.input', ['className' => 'col', 'name' => 'rooms', 'label' => 'Pièces', 'type' => 'number', 'value' => $property->rooms])
            @include('shared.input', ['className' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'type' => 'number', 'value' => $property->bedrooms])
            @include('shared.input', ['className' => 'col', 'name' => 'floor', 'label' => 'Etage', 'type' => 'number', 'value' => $property->floor])
        </div>

        <div class="row">
            @include('shared.input', ['className' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])
            @include('shared.input', ['className' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])
            @include('shared.input', ['className' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code])
        </div>

        @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])
        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])

        <div>
            <button class="btn btn-primary">
                @if($property->exists)
                    Editer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>
@endsection
