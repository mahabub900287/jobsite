<label for="{{ $name ?? '' }}" class="{{ $labelClass ?? 'col-sm-2' }} col-form-label {{ $required ?? '' }}">{{ $labelName }}</label>
<div class="{{ $inputColClass ?? 'col-sm-10' }}">
    <textarea name="{{ $name ?? '' }}" id="{{ $name ?? '' }}" @if(!empty($requiredInput)) required @endif placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? '4' }}" class="form-control {{ $inputClass ?? '' }}">{{ $value ?? '' }}</textarea>

    @if(!empty($optionalText))<span class="direction py-1 px-2 d-block">{{
        $optionalText }}</span>@endif

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>


