
<label for="{{ $name ?? '' }}" class="{{ $labelClass ?? 'col-sm-2' }} col-form-label {{ $required ?? '' }}">{{ $labelName }}</label>
<div class="{{ $inputColClass ?? 'col-sm-10' }}">
    <input name="{{ $name ?? '' }}" @if(!empty($requiredInput)) required @endif id="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}" type="{{ $type ?? 'text' }}" class="form-control form-control-sm {{ $inputClass ?? '' }}" @if(!empty($readonly)) readonly @endif >

    @if(!empty($optionalText))<span class="direction py-1 px-2 d-block">{{
        $optionalText }}</span>@endif

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>




