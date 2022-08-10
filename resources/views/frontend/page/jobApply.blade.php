@extends('layouts.frontend')
<!-- title -->
@section('title', $title)
<!-- meta title-->
@section('meta_title', $metaTitle)
<!-- meta desciption-->
@section('meta_description', $metaDesc)
<!-- internal css -->
@push('styles')
    <style>
        .narrowtxt {
            line-height: 18px;
        }

        .panel {
            border-radius: 5px !important;
        }

        .panel-title,
        .panel-heading,
        .panel-title h1 {
            padding-top: 10px;
            margin-top: 0px;
        }

        .btn-block {
            border-radius: 5px;
        }

        @media (min-width:500px) {
            .btn-block {
                width: 60% !important;
            }
        }
    </style>
@endpush
@section('main-content')
    <div class="container bg-light p-4 mb-4">
        <div class="s3-m-12 s3-p-8">
            <div class="col-xs-12 col-md-offset-1 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-title">
                        <h1 class="s3-fs-xs-3 text-center" style="color:#782f40;">Dietetic Internship Program Application</h1>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('frontend.apply-job.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="company_id" value="{{ $id->id }}">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inputFName">First Name</label>
                                    <input type="text" name="fname" class="form-control" id="InputFName"
                                        placeholder="First Name">
                                    @error('fname')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-6">
                                    <label for="InputLName">Last Name</label>
                                    <input type="text" name="lname" class="form-control" id="InputLName"
                                        placeholder="Last Name">
                                    @error('lname')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="InputEmail">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="InputEmail"
                                        placeholder="E-mail">
                                    @error('email')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-6">
                                    <label for="InputTel">Phone</label>
                                    <input type="tel" name="phone" class="form-control" id="InputTel"
                                        placeholder="Phone Number">
                                    @error('phone')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="InputAddress2">Address</label>
                                        <input type="text" name="address" class="form-control" id="InputAddress2"
                                            placeholder="Apartment #, Suite, etc.">
                                        @error('address')
                                            <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="InputState">State</label>
                                                <input type="text" name="state" class="form-control" id="InputState"
                                                    placeholder="State">
                                                @error('state')
                                                    <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="InputZip">Zip</label>
                                                <input type="number" name="zip" class="form-control" id="InputZip"
                                                    placeholder="Zip Code">
                                                @error('zip')
                                                    <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group col-6">
                                    <label for="InputEmail">Upload Your Cv</label>
                                    <input type="file" name="cv" class="form-control" id="InputEmail"
                                        placeholder="E-mail">
                                    @error('cv')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                            <hr />

                            <button type="submit" class="btn btn-block s3-gt center-block">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    <!-- internal js -->
    @push('scripts')
        <script></script>
    @endpush
