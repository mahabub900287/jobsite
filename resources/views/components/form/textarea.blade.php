
    <label for="{{ $name }}" class="{{ $required ?? '' }}">{{ $labelName }}</label>
    <textarea name="{{ $name }}" id="{{ $name ?? '' }}" class="form-control {{ $class ?? '' }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? '' }}" maxlength="{{ $maxlength ?? '' }}" @if(!empty($readonly)) readonly @endif>{{ $value ?? '' }}</textarea>

    @if(!empty($optionalText))<span style="background: #e9fff7; font-size: 12px; cursor: help;" class="py-1 px-2 d-block">{{ $optionalText }}</span>@endif

    @if(!empty($errorInput))
        @error($errorInput)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
