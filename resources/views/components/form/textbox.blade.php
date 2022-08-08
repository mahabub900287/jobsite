
    @if(!empty($labelName))<label for="{{ $name }}" class="{{ $required ?? '' }} {{ $labelClass ?? '' }}">{{ $labelName }}</label>@endif

    <input type="{{ $type ?? 'text' }}" data-role="{{ $tagsinput ?? '' }}" name="{{ $name }}" id="{{ $name }}" class="form-control form-control-sm {{ $class ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" @if(!empty($accept)) accept="{{ $accept }}" @endif maxlength="{{ $maxlength ?? '' }}"  @if(!empty($onchange)) onchange="{{ $onchange }}" @endif @if(!empty($readonly)) readonly @endif>

    @if(!empty($optionalText))<span style="background: #e9fff7; font-size: 12px; cursor: help;" class="py-1 px-2 d-block">{{ $optionalText }}</span>@endif

    @if(!empty($errorInput))
        @error($errorInput)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

