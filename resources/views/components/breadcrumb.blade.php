
@php
$breadcrumb;
@endphp
<div class="breadcrumb-header example bg-white mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumb as $title=>$url)
            <li class="breadcrumb-item text-dark {{ $loop->last ? 'active' : '' }}" aria-current="page">
                @if($loop->last) {{ $title }} @else <a class="text-dark" href="{{ $url }}">{{ $title }}</a> @endif</li>
            @endforeach
        </ol>
    </nav>
</div>

