
<div class="{{ $inputColClass ?? 'col-sm-10 offset-sm-2' }} {{ $class ?? '' }}">
    <input name="{{ $name ?? '' }}" id="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}" type="{{ $type ?? 'text' }}" class="form-control form-control-sm {{ $inputClass ?? '' }}">

    @if(!empty($optionalText))<span class="direction py-1 px-2 d-block">{{
        $optionalText }}</span>@endif

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>
