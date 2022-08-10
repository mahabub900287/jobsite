<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobCetagory;
use App\Models\JobType;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $categorys = JobCetagory::latest('id')->get();
            $this->setPageTitle('User Job Post', 'User Job Post','User Job Post');
            return view('frontend.page.user.job-post',compact('categorys'));

    }
    public function create(){
            $datas = JobType::latest('id')->get();
            $this->setPageTitle('User Job Post List', 'User Job Post List','User Job Post List');
            return view('frontend.page.user.job-post-list',compact('datas'));

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
            'category'     => 'required|max:255',
            'company_name' => 'required|max:255',
            'address'      => 'required|max:255',
            'selary_rang'  => 'required',
            'job_type'     => 'required',
            'description'  => 'required',
            'image'        => 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);
      // new image upload
      $imageName = $this->imageUpload( $request->file('image'),'media/Job/',null, null);
       $data =  JobType::create([
            'category'     => $request->category,
            'company_name' => $request->company_name,
            'address'      => $request->address,
            'selary_rang'  => $request->selary_rang,
            'job_type'     => $request->job_type,
            'description'  => $request->description,
            'image'        => $imageName,
        ]);
        return redirect()->route('frontend.job-post.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = JobType::find($id);
        $this->setPageTitle('User Job Post Edit', 'User Job Post Edit','User Job Post Edit');
        return view('frontend.page.user.eidit',compact('datas'));
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
        $datas = JobType::find($id);
        // new image update
        $imageName = $this->imageUpdate( $request->file('image'),'media/Job/',100, 100,$datas->image);
        $datas->update([
            'category'      => $request->category,
            'company_name'  => $request->company_name,
            'address'       => $request->address,
            'selary_rang'   => $request->selary_rang,
            'job_type'      => $request->job_type,
            'description'   => $request->description,
            'image'         => $imageName,
        ]);
        return redirect()->route('frontend.job-post.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = JobType::find($id);
        $this->imageDelete($datas->image);
        $datas->delete();
        return back();

    }
}
