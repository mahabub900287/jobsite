@extends('layouts.frontend')
<!-- title -->
@section('title', $title)
<!-- meta title-->
@section('meta_title', $metaTitle)
<!-- meta desciption-->
@section('meta_description', $metaDesc)
<!-- internal css -->
@push('styles')
@endpush
@section('main-content')
	<!-- 404-section-start  -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center defult-padding">
                    <img class="error-img" src="./img/section/404.png" alt="404-img">
                    <h2 class="text-color-primary mt-4">Page not found</h2>
                    <a class="defult-btn mt-4" href="{{ route('frontend.home.index') }}">Back to home</a>
                </div>
            </div>
        </div>
    </section>
	<!-- 404-section-close  -->
@endsection
<!-- internal js -->
@push('scripts')
@endpush
