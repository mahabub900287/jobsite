<!-- breadcrumb-section-start -->
@if (!Request::is('/'))
    <div class="breadcrumb-section pt-lg-4 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-title w-100 mx-auto d-flex flex-column justify-content-center align-items-center">
                        <h2 class="fw-bold text-center text-uppercase text-color-primary">{{  $title }}</h2>
                        <div class="breadcrumb-item">
                            <ul class="d-flex text-uppercase text-color-primary gap-3 mt-lg-4 fs-4">
                                <li><a class="" href="index.html">Home</a></li>
                                <li class="text-color-secondary"><i class="fa-solid fa-angle-right"></i></li>
                                @foreach ($breadcrumb as $title=>$url)
                                <li class="breadcrumb-item {{ $loop->last ? 'text-color-secondary' : '' }}">
                                    @if ($loop->last){{ $title }}@else <a href="{{ $url }}">{{ $title }}</a>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- breadcrumb-section-close -->
