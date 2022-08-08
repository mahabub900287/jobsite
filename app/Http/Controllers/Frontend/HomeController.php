<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexPage(){
        $this->setPageTitle('Home', 'Mamurbeta Home','Mamurbeta Home');
        return view('frontend.page.index');
    }
    public function userProfile(){
        $this->setPageTitle('User Profile', 'User Profile','Mamurbeta Home');
        return view('frontend.page.user.profile');
    }
    
}
