<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Setting;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeroContentRequest;



class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones_array = [];
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Apperance'=>'','Themesetting'=>''];
        $this->setPageTitle('Theme Setting');
        return view('backend.pages.settings.general',compact('breadcrumb','zones_array'));
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function digitalindex()
    {
        $zones_array = [];
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Apperance'=>'','Digital Boost'=>''];
        $this->setPageTitle('Digital boost Section');
        return view('backend.pages.settings.partnersetting',compact('breadcrumb','zones_array'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generalSettingStore(Request $request)
    {
        $request->validate([
            'theme_logo'         => 'nullable|mimes:png,jpg,svg,jpeg',
            'favicon'            => 'nullable|mimes:png,jpg,svg,jpeg,ico',
            'footer_logo'        => 'nullable|mimes:png,jpg,svg,jpeg',
            'footer_description' => 'nullable|string',
            'copy_right'         => 'nullable',
            'email'              => 'nullable|email',
            'phone'              => 'nullable'
        ]);
        // theme logo
        $logo = $this->imageUpdate($request->file('theme_logo'),'media/logo/', null,null,config('settings.theme_logo'));

        // secoundary logo
        $secoundary_logo = $this->imageUpdate($request->file('secoundary_logo'),'media/logo/',null,null,config('settings.secoundary_logo'));

        // favicon
        $favicon = $this->imageUpdate($request->file('favicon'), 'media/logo/', 32,32,config('settings.favicon'));

        // footer logo
        $footer_logo = $this->imageUpdate($request->file('footer_logo'), 'media/logo/', null,null,config('settings.footer_logo'));

        Setting::updateOrCreate(['key' => 'site_title'], ['value' => $request->site_title]);
        Setting::updateOrCreate(['key' => 'site_description'], ['value' => $request->site_description]);
        Setting::updateOrCreate(['key' => 'theme_logo'], ['value' => $logo]);
        Setting::updateOrCreate(['key' => 'secoundary_logo'], ['value' => $secoundary_logo]);
        Setting::updateOrCreate(['key' => 'favicon'], ['value' => $favicon]);
        Setting::updateOrCreate(['key' => 'footer_logo'], ['value' => $footer_logo]);
        Setting::updateOrCreate(['key' => 'footer_description'], ['value' => $request->footer_description]);
        Setting::updateOrCreate(['key' => 'copyright'], ['value' => $request->copy_right]);
        Setting::updateOrCreate(['key' => 'header_code'], ['value' => $request->header_code]);
        Setting::updateOrCreate(['key' => 'address'], ['value' => $request->address]);
        Setting::updateOrCreate(['key' => 'email'], ['value' => $request->email]);
        Setting::updateOrCreate(['key' => 'phone'], ['value' => $request->phone]);
        Setting::updateOrCreate(['key' => 'time_zone'], ['value' => $request->time_zone]);
        Setting::updateOrCreate(['key' => 'professional_agency'], ['value' => $request->professional_agency]);

     toastr()->success('Created Succssfully.', 'Success');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    * *@param \App\Http\Requests\HeroContentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function herosetionStore(HeroContentRequest $request)
    {
        //dd($request->all());
        $request->validated();

        // new image upload and old image delete from storage
        $hero_logo = $this->imageUpdate($request->file('hero_logo'), 'media/image/', null, null, config('settings.hero_logo'));

        Setting::updateOrCreate(['key' => 'title'], ['value' => $request->hero_title]);
        Setting::updateOrCreate(['key'=>'short_title'], ['value' => $request->subtitle]);
        Setting::updateOrCreate(['key'=>'button_one_text'], ['value' => $request->button_text_one]);
        Setting::updateOrCreate(['key'=>'button_one_url'], ['value' => $request->button_text_one_url]);
        Setting::updateOrCreate(['key'=>'button_two_text'], ['value' => $request->button_text_two]);
        Setting::updateOrCreate(['key'=>'button_two_url'], ['value' => $request->button_text_two_url]);
        Setting::updateOrCreate(['key' =>'hero_logo'], ['value' => $hero_logo]);


        toastr()->success('Data has been saved.');
        return back();
    }

    public function contactMap(Request $request){

        $request->validate([
            'con_map_link'     => 'required|string',
        ]);

         Setting::updateOrCreate(['key'=>'con_map_link'], ['value' => $request->con_map_link]);
         toastr()->success('Data has been saved.');
         return back();
    }

    public function whyus(Request $request){

        $request->validate([
            'why_logo'                    => 'nullable|mimes:png,jpg,svg,jpeg',
            'why_title'                   => 'nullable|string|max:55',
            'why_choose_pro_agency_title' => 'nullable|string|max:55',
            'why_choose_solution_title'   => 'nullable|string|max:55',
            'why_choose_pro_agency_desc'  => 'nullable|string|max:265',
            'why_choose_solution_desc'    => 'nullable|string|max:265',

        ]);

        // new image upload and old image delete from storage
        $why_site_image = $this->imageUpdate($request->file('why_logo'), 'media/image/', 'null', 'null', config('settings.why_site_image'));

        Setting::updateOrCreate(['key' => 'why_title'], ['value' => $request->title]);
        Setting::updateOrCreate(['key'=>  'why_short_title'], ['value' => $request->why_short_title]);
        Setting::updateOrCreate(['key' => 'why_site_image'], ['value' => $why_site_image]);
        Setting::updateOrCreate(['key' => 'why_choose_pro_agency_title'], ['value' => $request->why_choose_pro_agency_title]);
        Setting::updateOrCreate(['key' => 'why_choose_pro_agency_desc'], ['value' => $request->why_choose_pro_agency_desc]);
        Setting::updateOrCreate(['key' => 'why_choose_solution_title'], ['value' => $request->why_choose_solution_title]);
        Setting::updateOrCreate(['key' => 'why_choose_solution_desc'], ['value' => $request->why_choose_solution_desc]);

        toastr()->success('Data has been saved.');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faq(Request $request)
    {
        // validation
        $request->validate([
            'faqhomeimage'               => 'nullable|mimes:png,jpg,svg,jpeg',
            'faqsingleimage'             => 'nullable|mimes:png,jpg,svg,jpeg',
            'feq_title'                  => 'nullable|string|max:55',
            'feq_short_title'            => 'nullable|string|max:250',
        ]);
          // new image upload and old image delete from storage
          $faqhomeimage = $this->imageUpdate($request->file('home_logo'), 'media/image/', null, null, config('settings.faqhomeimage'));
          $faqsingleimage = $this->imageUpdate($request->file('single_logo'), 'media/image/', null,null, config('settings.faqsingleimage'));

          Setting::updateOrCreate(['key' => 'feq_title'], ['value' => $request->feq_title]);
          Setting::updateOrCreate(['key'=>  'feq_short_title'], ['value' => $request->feq_short_title]);
          Setting::updateOrCreate(['key' => 'faqhomeimage'], ['value' => $faqhomeimage]);
          Setting::updateOrCreate(['key' => 'faqsingleimage'], ['value' => $faqsingleimage]);
          toastr()->success('Data has been saved.');
          return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscription(Request $request)
    {
         // validation
         $request->validate([
            'subscription_image'         => 'nullable|mimes:png,jpg,svg,jpeg',
            'subscription_title'         => 'nullable|string|max:250',
        ]);
          // new image upload and old image delete from storage
          $subscription_image = $this->imageUpdate($request->file('subscription_image'), 'media/image/', null, null, config('settings.subscription_image'));


          Setting::updateOrCreate(['key' => 'subscription_title'], ['value' => $request->subscription_title]);
          Setting::updateOrCreate(['key' => 'subscription_image'], ['value' => $subscription_image]);
          toastr()->success('Data has been saved.');
          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function about_dropcall(Request $request)
    {
         // validation
         $request->validate([
            'about_dropcall_image'       => 'nullable|mimes:png,jpg,svg,jpeg',
            'about_dropcall_title'       => 'required|string|max:250',
            'about_dropcall_text'        => 'required|string',
        ]);
          // new image upload and old image delete from storage
          $about_dropcall_image = $this->imageUpdate($request->file('about_dropcall_image'), 'media/image/', null, null, config('settings.about_dropcall_image'));


          Setting::updateOrCreate(['key' =>  'about_dropcall_title'], ['value' => $request->about_dropcall_title]);
          Setting::updateOrCreate(['key' =>  'about_dropcall_text'], ['value' => $request->about_dropcall_text]);
          Setting::updateOrCreate(['key' => 'about_dropcall_image'], ['value' => $about_dropcall_image]);
          toastr()->success('Data has been saved.');
          return back();
    }

    public function differentiates(Request $request)
    {
         // validation
         $request->validate([
            'differentiates_title'       => 'nullable',
            'differentiates_text'        => 'nullable',
        ]);
          Setting::updateOrCreate(['key' =>  'differentiates_title'], ['value' => $request->differentiates_title]);
          Setting::updateOrCreate(['key' =>  'differentiates_text'], ['value' => $request->differentiates_text]);
          toastr()->success('Data has been saved.');
          return back();
    }

    public function callarea(Request $request)
    {
        // validation
        $request->validate([
            'marketing_image'       => 'nullable|mimes:png,jpg,svg,jpeg',
            'marketing_title'       => 'required|string|max:60',
            'marketing_text'        => 'required|string',
        ]);

        // new image upload and old image delete from storage
        $marketing_image = $this->imageUpdate($request->file('marketing_image'), 'media/image/', null, null, config('settings.marketing_image'));

        Setting::updateOrCreate(['key' => 'marketing_title'], ['value' =>$request->marketing_title]);
        Setting::updateOrCreate(['key' => 'marketing_text'], ['value' =>$request->marketing_text]);
        Setting::updateOrCreate(['key' => 'marketing_image'], ['value'=>$marketing_image]);

        toastr()->success('Data has been saved.');
        return back();
    }

    /**
     * Home marketing
     *
     * @param \
     * @return
     */
    public function homeMarketingStore(Request $request){
        // validate rules
        $request->validate([
            'title'       => ['required','string','max:180'],
            'description' => ['nullable','string'],
            'image'       => ['nullable','image','mimes:png,jpg,svg,gif','max:1024']
        ]);

        // new image upload and old image remove form storage
        $homeImage = $this->imageUpdate($request->file('image'), 'media/image/', null, null, config('settings.home_marketing_side_image'));

        // data create or update
        Setting::updateOrCreate(['key'=>'home_marketing_title'],['value'=>$request->title]);
        Setting::updateOrCreate(['key'=>'home_marketing_description'],['value'=>$request->description]);
        Setting::updateOrCreate(['key'=>'home_marketing_side_image'],['value'=>$homeImage]);

        toastr()->success('Data has been saved.');
        return back();
    }

    /**
     * social media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function socialMediaStore(Request $request){
        // validate rules
        $request->validate([
            'facebook'  => ['nullable','url'],
            'twitter'   => ['nullable','url'],
            'instagram' => ['nullable','url'],
            'linkedin'  => ['nullable','url']
        ]);

        // store DB
        Setting::updateOrCreate(['key'=>'facebook'],['value'=>$request->facebook]);
        Setting::updateOrCreate(['key'=>'twitter'],['value'=>$request->twitter]);
        Setting::updateOrCreate(['key'=>'instagram'],['value'=>$request->instagram]);
        Setting::updateOrCreate(['key'=>'linkedin'],['value'=>$request->linkedin]);

        toastr()->success('Social media has been saved.');
        return back();
    }


    /**
     * serviceMe media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function serviceMe(Request $request){
        // validate rules
        $request->validate([
            'service_me_title'    => 'nullable',
            'service_me_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'service_me_title'], ['value' => $request->service_me_title]);
        Setting::updateOrCreate(['key' => 'service_me_subtitle'], ['value' => $request->service_me_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

     /**
     * serviceMe media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function skill(Request $request){
        // validate rules
        $request->validate([
            'skill_title'    => 'nullable',
            'skill_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'skill_title'], ['value' => $request->skill_title]);
        Setting::updateOrCreate(['key' => 'skill_subtitle'], ['value' => $request->skill_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }
    /**
     * portfolio media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function portfolioStore(Request $request){
        // validate rules
        $request->validate([
            'portfolio_title'    => 'nullable',
            'portfolio_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'portfolio_title'], ['value' => $request->portfolio_title]);
        Setting::updateOrCreate(['key' => 'portfolio_subtitle'], ['value' => $request->portfolio_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

    /**
     * blog media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function blogStore(Request $request){
        // validate rules
        $request->validate([
            'blog_title'    => 'nullable',
            'blog_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'blog_title'], ['value' => $request->blog_title]);
        Setting::updateOrCreate(['key' => 'blog_subtitle'], ['value' => $request->blog_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }
    /**
     * testimonial media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function testimonialStore(Request $request){
        // validate rules
        $request->validate([
            'testimonial_title'    => 'nullable',
            'testimonial_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'testimonial_title'], ['value' => $request->testimonial_title]);
        Setting::updateOrCreate(['key' => 'testimonial_subtitle'], ['value' => $request->testimonial_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

/**
     * faq media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function faqStore(Request $request){
        // validate rules
        $request->validate([
            'faq_title'    => 'nullable',
            'faq_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'faq_title'], ['value' => $request->faq_title]);
        Setting::updateOrCreate(['key' => 'faq_subtitle'], ['value' => $request->faq_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

/**
     * question media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function questionStore(Request $request){
        // validate rules
        $request->validate([
            'question_title'    => 'nullable',
            'question_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'question_title'], ['value' => $request->question_title]);
        Setting::updateOrCreate(['key' => 'question_subtitle'], ['value' => $request->question_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }
/**
     * contact media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function contactStore(Request $request){
        // validate rules
        $request->validate([
            'contact_title'   => 'nullable',
            'contact_subtitle' => 'nullable',
            'contact_btn_text'           => 'nullable',
            'image'         => ['nullable','image','mimes:png,jpg,svg,gif']
        ]);

        // new image upload and old image delete from storage
        $Image = $this->imageUpdate($request->file('contact_image'), 'media/image/', null, null, config('settings.contact_image'));
        // store DB
        Setting::updateOrCreate(['key' => 'contact_title'], ['value' => $request->contact_title]);
        Setting::updateOrCreate(['key' => 'contact_subtitle'], ['value' => $request->contact_subtitle]);
        Setting::updateOrCreate(['key' => 'contact_btn_text'], ['value' => $request->contact_btn_text]);
        Setting::updateOrCreate(['key' => 'contact_image'], ['value' =>$Image]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }
     /**
     * team media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function teamStore(Request $request){
        // validate rules
        $request->validate([
            'team_title'    => 'nullable',
            'team_subtitle' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'team_title'], ['value' => $request->team_title]);
        Setting::updateOrCreate(['key' => 'team_subtitle'], ['value' => $request->team_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

    /**
     * Subscribe media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function subscribeStore(Request $request){
        // validate rules
        $request->validate([
            'subscribe_title'    => 'nullable',
            'subscribe_title' => 'nullable',
        ]);

        // store DB
        Setting::updateOrCreate(['key' => 'subscribe_title'], ['value' => $request->subscribe_title]);
        Setting::updateOrCreate(['key' => 'subscribe_subtitle'], ['value' => $request->subscribe_subtitle]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

         /**
     * Seo media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function seoStore(Request $request){
        // validate rules
        $request->validate([
            'site_name'        => 'nullable',
            'site_description' => 'nullable',
            'site_keywords'    => 'nullable',
            'fb_app_id'        => 'nullable',
        ]);

        // store DB
        $this->setPageTitle('Seo List');
        Setting::updateOrCreate(['key' => 'site_name'], ['value' => $request->site_name]);
        Setting::updateOrCreate(['key' => 'site_description'], ['value' => $request->site_description]);
        Setting::updateOrCreate(['key' => 'site_keywords'], ['value' => $request->site_keywords]);
        Setting::updateOrCreate(['key' => 'fb_app_id'], ['value' => $request->fb_app_id]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }
         /**
     * google media url
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function googleAnalyticStore(Request $request){
        // validate rules
        $request->validate([
            'google_analytic'   => 'nullable',
        ]);

        // store DB
        $this->setPageTitle('Seo List');
        Setting::updateOrCreate(['key' => 'google_analytic'], ['value' => $request->google_analytic]);
        toastr()->success('Data Has Been Saved Successfully.', 'Success');
        return back();
    }

}
