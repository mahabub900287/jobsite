<label for="{{ $name }}" class="{{ $required ?? '' }}">{{ $labelName }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-control form-control-sm {{ $class ?? '' }}">
    {{ $slot }}
</select>


