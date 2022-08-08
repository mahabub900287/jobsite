<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        // breadcrumb
        $breadcrumb = ['Dashboard' => ''];
        $this->setPageTitle('Admin Dashboard');
       return view('backend.pages.dashboard.index',compact('breadcrumb'));
    }
}
