@if(!empty($labelName))<label for="{{ $name }}" class="{{ $required ?? '' }} {{ $labelClass ?? '' }}">{{ $labelName ?? '' }}</label>@endif
<select name="{{ $name }}" id="{{ $name }}" class="form-control form-control-sm {{ $class ?? '' }}" @if(!empty($parsley_trigger)) data-parsley-trigger="{{ $parsley_trigger }}" required="" @endif @if(!empty($onchange)) onchange="{{ $onchange }}" @endif @if(!empty($multiple)) multiple="multiple" @endif @if (!empty($onchange)) onchange="{{ $onchange }}" @endif>
{{ $slot }}
</select>

@if(!empty($errorInput))
    @error($errorInput)
        <span class="text-danger">{{ $message }}</span>
    @enderror
@endif
