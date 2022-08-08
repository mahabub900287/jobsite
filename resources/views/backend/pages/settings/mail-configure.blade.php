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
                    <form action="{{ route('admin.settings.mail.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <x-form.selectbox name="mail_mailer" labelName="Mail Driver (Protocol)" required="required" errorInput="mail_mailer">
                                    <option value="smtp" {{ config('app.mail_mailer') === 'smtp' ? 'selected' : '' }}>smtp</option>
                                    <option value="sendmail" {{ config('app.mail_mailer') === 'sendmail' ? 'selected' : '' }}>sendmail</option>
                                    <option value="mail" {{ config('app.mail_mailer') === 'mail' ? 'selected' : '' }}>mail</option>
                            </x-form.selectbox>
                        </div>

                        <div class="form-group">
                            <x-form.textbox labelName="Host Name" name="mail_host" required="required" value="{{ config('app.mail_host') ?? '' }}" placeholder="Enter host name" errorInput="mail_host"/>
                        </div>

                        <div class="form-group">
                            <x-form.textbox labelName="Mail Username" name="mail_username" required="required"
                            value="{{ config('app.mail_username') ?? '' }}" placeholder="Enter mail username" errorInput="mail_username" />
                        </div>

                        <div class="form-group">
                            <x-form.textbox labelName="Password" name="mail_password" required="required"
                            value="{{ config('app.mail_password') ?? '' }}" placeholder="Enter mail password" errorInput="mail_password" />
                        </div>

                        <div class="form-group">
                            <x-form.textbox labelName="Mail From Address" name="mail_from_address" required="required"
                            value="{{ config('app.mail_from') ?? '' }}" placeholder="Enter mail password" errorInput="mail_from_address" />
                        </div>

                        <div class="form-group">
                            <x-form.textbox labelName="Mail Port" name="mail_port" required="required" value="{{ config('app.mail_port') ?? '' }}"
                            placeholder="Enter mail port" errorInput="mail_port" />
                        </div>

                        <div class="form-group">
                            <x-form.selectbox labelName="Encryption" name="mail_encryption" required="required" errorInput="mail_encryption">
                                <option value="null" {{ config('app.mail_encryption') === null ? 'selected' : '' }}>none</option>
                                <option value="tls" {{ config('app.mail_encryption') === 'tls' ? 'selected' : '' }}>tls</option>
                                <option value="ssl" {{ config('app.mail_encryption') === 'ssl' ? 'selected' : '' }}>ssl</option>
                            </x-form.selectbox>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
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
