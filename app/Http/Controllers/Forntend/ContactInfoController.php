<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function contactInfo(Request $request){
        //data insert
        ContactInfo::create([
            'email'   =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ]);
        toastr()->success('Updated Successfully.', 'Success');
        return back();
    }
}
