<div class="form-group {{ $col ?? '' }} {{ $required ?? '' }}">
    <input type="{{ $type ?? '' }}" name="{{ $name }}" id="{{ $name }}" class="{{ $class ?? '' }}"  data-show-errors='true' data-errors-position='outside' data-allowed-file-extensions='jpg jpeg png svg webp gig' value="{{ $value ?? '' }}" @if (!empty($onkeyup)) @endif placeholder="{{ $placeholder ?? '' }}">

    <input type="hidden" name="old_{{ $name }}" id="old_{{ $name }}">
</div>
