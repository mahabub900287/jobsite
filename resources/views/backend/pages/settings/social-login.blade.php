@extends('layouts.backend')
<!-- title -->
@section('title',$title)
<!-- internal css -->
@push('styles')

@endpush

@section('main-content')
<div class="app-main__inner">
    <div class="row">
        <div class="col-md-7 mx-auto col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-body pt-1">
                    <form action="{{ route('admin.settings.social.login.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="card" style="box-shadow: none !important;">
                                <div class="card-header pl-0 text-left">
                                    <h4 class="card-title">Google</h4>
                                </div>
                                <div class="card-block mt-3">

                                    <div class="form-group">
                                        <x-form.textbox name="google_client_id" labelName="Client ID"
                                            value="{{ config('app.google_client_id') ?? old('google_client_id') }}" />
                                        @error('google_client_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <x-form.textbox name="google_client_secret_key" labelName="Client Secret Key"
                                            value="{{ config('app.google_key') ?? old('google_client_secret_key') }}" />
                                        @error('google_client_secret_key')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="box-shadow: none !important;">
                                <div class="card-header pl-0">
                                    <h4 class="card-title">Facebook</h4>
                                </div>
                                <div class="card-block mt-3">
                                    <div class="form-group">
                                        <x-form.textbox name="facebook_client_id" labelName="Client ID"
                                            value="{{ config('app.facebook_client_id') ?? old('facebook_client_id') }}" />
                                        @error('facebook_client_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <x-form.textbox name="facebook_client_secret_key" labelName="Client Secret Key"
                                            value="{{ config('app.facebook_key') ?? old('facebook_client_secret_key') }}" />
                                        @error('facebook_client_secret_key')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- internal js -->
@push('scripts')

@endpush
