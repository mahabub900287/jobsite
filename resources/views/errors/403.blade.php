@extends('layouts.frontend')
<!-- title -->
@section('title','403 Forbidden error')
<!-- meta title-->
@section('meta_title', '403 Forbidden error')
<!-- meta desciption-->
@section('meta_description', '403 Forbidden error')
<!-- internal css -->
@push('styles')
@endpush

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center defult-padding">
                <img class="error-img" src="./img/section/404.png" alt="404-img">
                <h2 class="text-color-primary mt-4">403 Forbidden error</h2>
                <a class="defult-btn mt-4" href="{{ route('frontend.home.index') }}">Back to home</a>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- internal js -->
@push('scripts')
<script>
</script>
@endpush
