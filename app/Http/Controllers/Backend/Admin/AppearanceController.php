<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function theme(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Appearance'=>'','Themes'=>''];
        $this->setPageTitle('Appearance Themes');
        return view('backend.pages.appearance.theme',compact('breadcrumb'));
    }

    public function general(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Appearance'=>'','General'=>''];
        $this->setPageTitle('Appearance General');
        return view('backend.pages.appearance.genaral',compact('breadcrumb'));
    }

    public function socialMedia(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Appearance'=>'','Social-Media'=>''];
        $this->setPageTitle('Appearance Social Media');
        return view('backend.pages.appearance.social',compact('breadcrumb'));
    }
    public function contactMap(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Appearance'=>'','Contact-Map'=>''];
        $this->setPageTitle('Appearance Contact Map');
        return view('backend.pages.appearance.contact',compact('breadcrumb'));
    }

    public function contactPage(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Contact Value'=>''];
        $this->setPageTitle('Contact Value');
        return view('backend.pages.contact_title_subtitle.index',compact('breadcrumb'));
    }

    public function subscribePage(){
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Subscribe'=>''];
        $this->setPageTitle('Subscribe');
       return view('backend.pages.subscribes.index',compact('breadcrumb'));
    }
}
