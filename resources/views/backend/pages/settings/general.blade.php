@extends('layouts.backend')
<!-- title -->
@section('title', $title)
<!-- internal css -->
@push('styles')
    <style>
        #removeFormBtn,
        #removeClickBtn {
            position: absolute;
            top: 7px;
            right: 17px;
            border-radius: 50%;
        }

        #social-icon-form {
            margin-top: 15px;
        }

        #social-icon-form:first-child {
            margin-top: 0;
        }

    </style>
@endpush

@section('main-content')
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.setting.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="site_title"  labelName="Site Title"
                                value="<?php echo config('settings.site_title') ?? old('site_title'); ?>" errorName="address">
                                </x-horizontal-form.textbox>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea  name="site_description" labelName="Site Description"
                                value="<?php echo config('settings.site_description') ?? old('site_description'); ?>" errorName="site_description">
                                </x-horizontal-form.textarea>
                            </div>


                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <label for="">Primary Logo</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="avatar-preview text-start">
                                                <img id="preview_img"
                                                    src="{{ asset(file_exists(config('settings.theme_logo')) ? config('settings.theme_logo') : 'backend/images/no-image.png') }}"
                                                    alt=""><br>
                                                <input type='file' onchange="image_preview()" id="theme-logo"
                                                    class="d-none" name="theme_logo" accept=".png, .jpg, .jpeg" />
                                                <label for="theme-logo" class="choose-image-btn">Choose logo</label>
                                            </div>
                                            <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                                class="py-1 px-2 d-block">Valid image:
                                                jpg,png,svg,jpeg</span>

                                            @error('theme_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <label for="">Secoundary Logo</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="avatar-preview text-start">
                                                <img id="secoundary"
                                                    src="{{ asset(file_exists(config('settings.secoundary_logo')) ? config('settings.secoundary_logo') : 'backend/images/no-image.png') }}"
                                                    alt=""><br>
                                                <input type='file' onchange="image_secoundary()" id="secoundary-logo"
                                                    class="d-none" name="secoundary_logo"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="secoundary-logo" class="choose-image-btn">Choose logo</label>
                                            </div>
                                            <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                                class="py-1 px-2 d-block">Valid image:
                                                jpg,png,svg,jpeg</span>

                                            @error('secoundary_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <label for="">Footer Logo</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="avatar-preview text-start">
                                                <img id="footer_logo"
                                                    src="{{ asset(file_exists(config('settings.footer_logo')) ? config('settings.footer_logo') : 'backend/images/no-image.png') }}"
                                                    alt=""><br>
                                                <input type='file' onchange="footerLogo()" id="footer-logo"
                                                    class="d-none" name="footer_logo" accept=".png, .jpg, .jpeg" />
                                                <label for="footer-logo" class="choose-image-btn">Choose logo</label>
                                            </div>
                                            <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                                class="py-1 px-2 d-block">Valid image:
                                                jpg,png,svg,jpeg</span>

                                            @error('footer_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <label for="">Favicon</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="avatar-preview text-start">
                                                <img id="favicon_img"
                                                    src="{{ asset(file_exists(config('settings.favicon')) ? config('settings.favicon') : 'backend/images/no-image.png') }}"
                                                    alt=""><br>
                                                <input type='file' onchange="theme_favicon()" id="favicon"
                                                    class="d-none" name="favicon" accept=".png, .jpg, .jpeg" />
                                                <label for="favicon" class="choose-image-btn">Choose logo</label>
                                            </div>
                                            <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                                class="py-1 px-2 d-block">Valid image: png,svg,ico Size: 32X32</span>
                                            @error('favicon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea  name="address"  labelName="Address" id="address" rows="10"
                                value="<?php echo config('settings.address') ?? old('address'); ?>" errorName="address">
                                </x-horizontal-form.textarea>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox type="email" name="email" labelName="Email"
                                    value="{{ config('settings.email') ?? old('email') }}" />

                                @error('email')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="phone" labelName="Phone"
                                value="{!! config('settings.phone') ?? '' !!}">
                                </x-horizontal-form.textbox>
                                @error('phone')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea rows="3" name="footer_description"
                                    labelName="Footer Description" placeholder="footer description"
                                    optionalText="Descriptin max 180 characters"
                                    value="{{ config('settings.footer_description') ?? old('footer_description') }}" />


                                @error('footer_description')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="copy_right" labelName="Copyright"
                                    placeholder="enter your text"
                                    value="{!! config('settings.copyright') ?? '' !!}" />

                                @error('copy_right')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--
                            <div class="row mb-3">
                                <x-horizontal-form.textarea rows="3" name="header_code" labelName="Header Code"
                                    placeholder="code:" value="{!! config('settings.header_code') ?? old('header_code') !!}" />
                            </div> -->

                            <div class="row mb-3">
                                <x-horizontal-form.selectbox name="time_zone" inputClass="select-2" labelName="Time Zone">
                                    <option value="">Select Timezone</option>
                                    @foreach ($zones_array as $zone)
                                        <option value="{{ $zone['zone'] }}"
                                            {{                                             config('app.timezone') == $zone['zone'] ? 'selected' : '' }}>
                                            {{ $zone['diff_from_GMT'] . ' - ' . $zone['zone'] }}
                                        </option>
                                    @endforeach
                                </x-horizontal-form.selectbox>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="professional_agency" labelName="Professional Agency"
                                    placeholder="enter your text"
                                    value="{{ config('settings.professional_agency') ?? old('professional_agency') }}" />

                                @error('professional_agency')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Hero Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.herosetion.Store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="hero_title" labelName="Hero Title"
                                    value="{{ config('settings.title') ?? old('title') }}" />

                                @error('hero_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea name="subtitle" labelName="Subtitle"
                                    value="{{ config('settings.short_title') ?? old('short_title') }}">
                                </x-horizontal-form.textarea>

                                @error('subtitle')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-5">
                                <div class="row mb-3">
                                    <x-horizontal-form.textbox name="button_text_one" labelName="Button One Text"
                                        value="{{ config('settings.button_one_text') ?? old('button_text_one') }}" />

                                    @error('button_text_one')
                                        <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <x-horizontal-form.textbox name="button_text_one_url" labelName="Button One URL"
                                        value="{{ config('settings.button_one_url') ?? old('button_text_one_url') }}" />

                                    @error('button_text_one_url')
                                        <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="button_text_two" labelName="Button Two Text"
                                    value="{{ config('settings.button_two_text') ?? old('button_text_two') }}" />

                                @error('button_text_two')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="button_text_two_url" labelName="Button Two URL"
                                    value="{{ config('settings.button_two_url') ?? old('button_text_two_url') }}" />

                                @error('button_text_two_url')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Hero Setion Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="hero_img"
                                                src="{{ asset(file_exists(config('settings.hero_logo')) ? config('settings.hero_logo') : 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_hero()" id="hero-logo" class="d-none"
                                                name="hero_logo" accept=".png, .jpg, .jpeg" />
                                            <label for="hero-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('hero_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Why Choose Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.whyus.Store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="title" labelName="Title"
                                    value="{{ config('settings.why_title') ?? old('why_title') }}" />

                                @error('title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea  name="why_short_title" id="why_short_title" rows="10" cols="80" labelName="Subtitle"
                                value="<?php echo config('settings.why_short_title') ?? old('why_short_title'); ?>">
                                </x-horizontal-form.textarea>
                                @error('why_short_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="why_choose_pro_agency_title"
                                    labelName="Whychoose Profession Agency Title"
                                    value="{{ config('settings.why_choose_pro_agency_title') ?? old('why_choose_pro_agency_title') }}" />

                                @error('whychoose_pro_agency_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea name="why_choose_pro_agency_desc"
                                    labelName="Whychoose Profession Agency Discription"
                                    value="{{ config('settings.why_choose_pro_agency_desc') ?? old('why_choose_pro_agency_desc') }}">
                                </x-horizontal-form.textarea>

                                @error('whychoose_pro_agency_desc')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="why_choose_solution_title"
                                    labelName="Why Choose Solution Title"
                                    value="{{ config('settings.why_choose_solution_title') ?? old('why_choose_solution_title') }}" />

                                @error('whychoose_solution_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea name="why_choose_solution_desc"
                                    labelName="Why Choose Solution Discription"
                                    value="{{ config('settings.why_choose_solution_desc') ?? old('why_choose_solution_desc') }}">
                                </x-horizontal-form.textarea>

                                @error('whychoose_pro_agency_desc')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Why Us Banner</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="why_img"
                                                src="{{ asset(file_exists(config('settings.why_site_image')) ? config('settings.why_site_image') : 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_why()" id="why-logo" class="d-none"
                                                name="why_logo" accept=".png, .jpg, .jpeg" />
                                            <label for="why-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('why_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Social Media</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.social-media.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="facebook" labelName="Facebook" placeholder="facebook url"
                                    optionalText="Valid facebook url"
                                    value="{{ config('settings.facebook') ?? old('facebook') }}" />

                                @error('facebook')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="twitter" labelName="Twitter" placeholder="twitter url"
                                    optionalText="Valid twitter url" value="{{ config('settings.twitter') ?? old('twitter') }}" />

                                @error('twitter')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="linkedin" labelName="Linkedin" placeholder="linkedin url"
                                    optionalText="Valid linkedin url"
                                    value="{{ config('settings.linkedin') ?? old('linkedin') }}" />

                                @error('linkedin')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="instagram" labelName="Instagram"
                                    placeholder="instagram url" optionalText="Valid instagram url"
                                    value="{{ config('settings.instagram') ?? old('instagram') }}" />

                                @error('instagram')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Contact area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Contact Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.contact.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textarea  name="con_address"  labelName="Contact Address"
                                value="<?php echo config('settings.con_address') ?? old('con_address'); ?>">
                                </x-horizontal-form.textarea>
                                @error('con_address')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <x-horizontal-form.textarea  name="con_cell"  labelName="Phone"
                                    value="<?php echo config('settings.con_cell') ?? old('con_cell'); ?>">
                                </x-horizontal-form.textarea>
                                @error('con_cell')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="my-5">
                                <div class="row mb-3">
                                    <x-horizontal-form.textbox name="con_email" labelName="Contact Email"
                                        value="{{ config('settings.con_email') ?? old('con_email') }}" />

                                    @error('con_email')
                                        <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <x-horizontal-form.textbox name="con_map_link" labelName="Contact Map Link"
                                        value="{{ config('settings.con_map_link') ?? old('con_map_link') }}" />

                                    @error('con_map_link')
                                        <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="con_title" labelName="Contact Title"
                                    value="{{ config('settings.con_title') ?? old('con_title') }}" />

                                @error('con_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="con_short_title" labelName="Contact Short Title"
                                    value="{{ config('settings.con_short_title') ?? old('con_short_title') }}" />

                                @error('con_short_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Contact Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="contact_logo"
                                                src="{{ asset(file_exists(config('settings.contact_logo')) ? config('settings.contact_logo') : 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_contact()" id="contact-logo"
                                                class="d-none" name="contact_logo" accept=".png, .jpg, .jpeg" />
                                            <label for="contact-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('contact_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Feq area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">FAQ Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.faq.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="feq_title" labelName="FEQ Title"
                                    value="{{ config('settings.feq_title') ?? old('feq_title') }}" />

                                @error('feq_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="feq_short_title" labelName="FEQ Short Title"
                                    value="{{ config('settings.feq_short_title') ?? old('feq_short_title') }}" />

                                @error('feq_short_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Feq Home Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="home_logo"
                                                src="{{ asset(file_exists(config('settings.faqhomeimage')) ? config('settings.faqhomeimage') : 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_home()" id="home-logo"
                                                class="d-none" name="home_logo" accept=".png, .jpg, .jpeg" />
                                            <label for="home-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('home_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Feq Single Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="single_logo"
                                                src="{{ asset(file_exists(config('settings.faqsingleimage')) ? config('settings.faqsingleimage') : 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_single()" id="single-logo"
                                                class="d-none" name="single_logo" accept=".png, .jpg, .jpeg" />
                                            <label for="single-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('single_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Feq area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Subscription</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.subscription.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="subscription_title" labelName="Subscription Title"
                                    value="{{ config('settings.subscription_title') ?? old('subscription_title') }}" />

                                @error('subscription_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">Subscription Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="subscription_logo"
                                                src="{{ asset(file_exists(config('settings.subscription_image'))? config('settings.subscription_image'): 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_subscription()" id="subscription-logo"
                                                class="d-none" name="subscription_image"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="subscription-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('home_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- about dropcall area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">About Dropcall</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.about_dropcall.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="about_dropcall_title" labelName="About Dropcall Title"
                                    value="{{ config('settings.about_dropcall_title') ?? old('about_dropcall_title') }}" />

                                @error('about_dropcall_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">

                                <x-horizontal-form.textarea name="about_dropcall_text" id="about_dropcall_text" rows="10"
                                    cols="80" labelName="About Dropcall Text" value="<?php echo config('settings.about_dropcall_text') ?? old('about_dropcall_text'); ?>">
                                    About Dropcall Text
                                </x-horizontal-form.textarea>

                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor 4
                                    // instance, using default configuration.
                                    CKEDITOR.replace('about_dropcall_text');
                                </script>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <label for="">About Dropcall Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="avatar-preview text-start">
                                            <img id="about_dropcall_logo"
                                                src="{{ asset(file_exists(config('settings.about_dropcall_image'))? config('settings.about_dropcall_image'): 'backend/images/no-image.png') }}"
                                                alt=""><br>
                                            <input type='file' onchange="image_about_dropcall()" id="about_dropcall-logo"
                                                class="d-none" name="about_dropcall_image"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="about_dropcall-logo" class="choose-image-btn">Choose logo</label>
                                        </div>
                                        <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                            class="py-1 px-2 d-block">Valid image:
                                            jpg,png,svg,jpeg</span>

                                        @error('about_dropcall_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- about Differentiates area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Differentiates Dropcall</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.differentiates.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="differentiates_title" labelName="Differentiates Title"
                                    value="{{ config('settings.differentiates_title') ?? old('differentiates_title') }}" />

                                @error('differentiates_title')
                                    <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">

                                <x-horizontal-form.textarea name="differentiates_text" id="differentiates_text" rows="10"
                                    cols="80" labelName="Differentiates Text" value="<?php echo config('settings.differentiates_text') ?? old('differentiates_text'); ?>">
                                    About Dropcall Text
                                </x-horizontal-form.textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- About Call Marketing area --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">About Call Marketing</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.callarea.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="marketing_title" labelName="About marketing Title"
                                    value="{{ config('settings.marketing_title') ?? old('marketing_title') }}" />

                                @error('marketing_title')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">

                                <x-horizontal-form.textarea  name="marketing_text" id="marketing_text" rows="10" cols="80" labelName="About Marketing Text"
                                value="<?php echo config('settings.marketing_text') ?? old('marketing_text'); ?>">
                                </x-horizontal-form.textarea>
                                @error('marketing_text')
                                <span class="text-danger offset-sm-3 col-sm-9">{{ $message }}</span>
                                @enderror
                            </div>
                                <div class="col-md-12 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-sm-2">
                                            <label for="">About Marketing Image</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="avatar-preview text-start">
                                                <img id="marketing_logo"
                                                    src="{{ asset(file_exists(config('settings.marketing_image')) ? config('settings.marketing_image') : 'backend/images/no-image.png') }}"
                                                    alt=""><br>
                                                <input type='file' onchange="image_marketing()" id="marketing-logo"
                                                    class="d-none" name="marketing_image" accept=".png, .jpg, .jpeg" />
                                                <label for="marketing-logo" class="choose-image-btn">Choose logo</label>
                                            </div>
                                            <span style="background: #e9fff7; font-size: 12px; cursor: help;"
                                                class="py-1 px-2 d-block">Valid image:
                                                jpg,png,svg,jpeg</span>

                                            @error('marketing_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Home Page --}}
                <div class="card card-primary">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Home Call Marketing</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.apperance.home-marketing.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <x-horizontal-form.textbox name="title" labelName="Title"
                                    value="{{ config('settings.home_marketing_title') ?? old('title') }}" errorName="title"/>
                            </div>

                            <div class="row mb-3">
                                <x-horizontal-form.textarea name="description" rows="10" cols="80" labelName="Description" errorName="description"
                                value="<?php echo config('settings.home_marketing_description') ?? old('marketing_text'); ?>">
                                </x-horizontal-form.textarea>
                            </div>

                            <div class="row">
                                <x-horizontal-form.image-upload labelName="Side Image" imageId="home-side-image" name="image" errorName="image" issetName="{{ config('settings.home_marketing_side_image') }}" imagePath="{{ config('settings.home_marketing_side_image') }}" optionalText="The image max size 1M, type: jpg,png.svg,gif"/>
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
    <script>
        CKEDITOR.replace('address');
        CKEDITOR.replace('about_dropcall_text');
        CKEDITOR.replace('marketing_text');
        CKEDITOR.replace('why_short_title');
        CKEDITOR.replace('description');

        // image preview
        function image_preview() {
            preview_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function theme_favicon() {
            favicon_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function footerLogo() {
            footer_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function whyUS() {
            whyus_image.src = URL.createObjectURL(event.target.files[0]);
        }
        $(document).on('change', '#image-input-one', function() {
            one_image.src = URL.createObjectURL(event.target.files[0]);
        })


        $(document).on('change', '#image-input-two', function() {
            two_image.src = URL.createObjectURL(event.target.files[0]);
        })

        $(document).on('change', '#image-input-three', function() {
            three_image.src = URL.createObjectURL(event.target.files[0]);
        })

        function background_image() {
            background_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_contact() {
            contact_logo.src = URL.createObjectURL(event.target.files[0]);
        }
        function image_marketing() {
            marketing_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_home() {
            home_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_subscription() {
            subscription_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_about_dropcall() {
            about_dropcall_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_single() {
            single_logo.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_hero() {
            hero_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function image_why() {
            why_img.src = URL.createObjectURL(event.target.files[0]);
        }
        $('.select-2').select2();

        CKEDITOR.replace('content');

        // front info
        // function add_new_row(){
        //     $('#social-icon-form').clone().find('input').val('').end().appendTo('#socialEmptyForm');
        // }
    </script>
@endpush
