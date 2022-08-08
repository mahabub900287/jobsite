<label for="" class="{{ $required ?? '' }}">{{ $labelName }}</label>

<div class="avatar-preview text-start">
    @if(!empty($issetName))
        <img id="{{ $imageId }}" src="{{ asset(file_exists($imagePath) ? $imagePath : 'backend/images/no-image.png') }}"
        alt=""><br>
    @else
        <img id="{{ $imageId }}" src="{{ asset('backend/images/no-image.png') }}"
        alt=""><br>
    @endif

    <input type='file' onchange="document.getElementById('{{ $imageId }}').src = window.URL.createObjectURL(this.files[0])" id="{{ $name }}" class="d-none"
        name="{{ $name }}" accept="image/*" />
    <label for="{{ $name }}" class="choose-image-btn">Choose image</label>
</div>

@if(!empty($optionalText))<span class="direction py-1 px-2">{{ $optionalText }}</span>@endif

@if (!empty($errorName))
    @error($errorName)
        <span class="text-danger {{ $errorClass ?? '' }}">{{ $message }}</span>
    @enderror
@endif
