<div class="form-group">
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $labelName }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control shadow-none" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}">
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    @endif
</div>
