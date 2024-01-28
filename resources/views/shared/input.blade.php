@php
$type ??= 'text';
$className ??= null;
$name ??= null;
$label ??= ucfirst($name);
$value ??= null;
@endphp

<div @class(["form-group", $className])>
    <label for="{{ $name }}">{{ $label }}</label>

    @if($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control @error($name) is-invalid  @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}" />
    @endif
        @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
