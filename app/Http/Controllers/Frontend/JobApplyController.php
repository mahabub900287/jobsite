<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobApplycation;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = JobApplycation::with('company')->latest('id')->get();
        $this->setPageTitle('User Job Post', 'User Job Post','User Job Post');
        return view('frontend.page.user.job-apply',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname'     => 'required|max:20',
            'lname'     => 'required|max:10',
            'email'     => 'required|max:255',
            'phone'     => 'required|max:11',
            'address'   => 'required',
            'state'     => 'required',
            'zip'       => 'required',
            'cv'        => 'required'
        ]);
     // new image upload
      $cvUpload = $this->imageUpload( $request->file('cv'),'media/cv/',null, null);
      $data =  JobApplycation::create([
                'company_id'  => $request->company_id,
                'user_id'     => $request->user_id,
                'fname'       => $request->fname,
                'lname'       => $request->lname,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'address'     => $request->address,
                'state'       => $request->state,
                'zip'         => $request->zip,
                'cv'          => $cvUpload
       ]);
       return redirect()->route('frontend.apply-job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
