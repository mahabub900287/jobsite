@extends('layouts.frontend')
<!-- title -->
@section('title','Server Error')
<!-- meta title-->
@section('meta_title', 'Server Error')
<!-- meta desciption-->
@section('meta_description', 'Server Error')
<!-- internal css -->
@push('styles')
@endpush

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center defult-padding">
                <img class="error-img" src="./img/section/405.png" alt="405-img">
                <h2 class="text-color-primary mt-4">Enternal Server Error</h2>
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
