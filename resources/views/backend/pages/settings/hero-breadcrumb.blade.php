@extends('layouts.backend')
<!-- title -->
@section('title',$title)
<!-- internal css -->
@push('styles')

@endpush

@section('main-content')
<div class="app-main__inner">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header border-bottom">
                    <h4 class="card-title">About</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.apperance.hero-breadcumb.about.store') }}" method="POST">
                        @csrf

                        <div class="row-mb">
                            <div class="row">
                                <x-horizontal-form.textbox name="title" labelName="Title"
                                value="{{ config('settings.about_breadcrumb_title') ?? old('title') }}" errorName="title">
                                </x-horizontal-form.textbox>
                            </div>

                            <div class="row">
                                <x-horizontal-form.textarea name="description" labelName="Description"
                                value="{{ config('settings.about_breadcrumb_description') ?? old('description') }}" errorName="description">
                                </x-horizontal-form.textarea>
                            </div>
                        </div>

                        <div class="contact">
                            <div class="card-header pl-0">
                                <h4 class="card-title">Contact</h4>
                            </div>

                            <div class="row-mb mt-2">
                                <div class="row">
                                    <x-horizontal-form.textbox name="contact_title"  labelName="Title"
                                    value="{{ config('settings.contact_breadcrumb_title') ?? old('title') }}" errorName="contact_title">
                                    </x-horizontal-form.textbox>
                                </div>

                                <div class="row">
                                    <x-horizontal-form.textarea name="contact_description" labelName="Description"
                                    value="{{ config('settings.contact_breadcrumb_description') ?? old('description') }}" errorName="contact_description">
                                    </x-horizontal-form.textarea>
                                </div>

                            </div>
                        </div>

                        <div class="blog">
                            <div class="card-header pl-0">
                                <h4 class="card-title">Blog</h4>
                            </div>

                            <div class="row-mb mt-2">
                                <div class="row">
                                    <x-horizontal-form.textbox name="blog_title" labelName="Title"
                                    value="{{ config('settings.blog_breadcrumb_title') ?? old('title') }}" errorName="blog_title">
                                    </x-horizontal-form.textbox>
                                </div>

                                <div class="row">
                                    <x-horizontal-form.textarea name="blog_description"  labelName="Description"
                                    value="{{ config('settings.blog_breadcrumb_description') ?? old('description') }}" errorName="blog_description">
                                    </x-horizontal-form.textarea>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Save Change</button>
                                    </div>
                                </div>
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
