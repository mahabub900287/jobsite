<label for="{{ $name ?? '' }}" class="{{ $labelClass ?? 'col-sm-3' }} col-form-label {{ $required ?? '' }}">{{ $labelName }}</label>
<div class="custom-control custom-switch {{ $colClass ?? '' }} col-sm-9">
    <input type="checkbox" name="{{ $name ?? '' }}" class="custom-control-input" id="{{ $name ?? '' }}">
    <label class="custom-control-label {{ $statusClass ?? '' }}" for="{{ $name ?? '' }}">{{ $statusName }}</label>
</div>
