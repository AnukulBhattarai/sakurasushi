@props(['name', 'oldvalue' => null, 'label' => null])
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10">{{ old($name, $oldvalue) }}</textarea>
    @if ($errors->has($name))
        <div id="defaultFormControlHelp" class="form-text text-danger">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
