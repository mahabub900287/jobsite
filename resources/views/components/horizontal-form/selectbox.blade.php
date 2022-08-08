<label for="{{ $name ?? '' }}" class="{{ $labelClass ?? 'col-sm-2' }} col-form-label {{ $required ?? '' }}">{{ $labelName }}</label>
<div class="{{ $inputColClass ?? 'col-sm-10' }}">
    <select name="{{ $name ?? '' }}" id="{{ $name ?? '' }}" class="form-control form-control-sm {{ $inputClass ?? '' }}" @if (!empty($onchange)) onchange="{{ $onchange }}" @endif>

        {{ $slot }}
    </select>

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>




