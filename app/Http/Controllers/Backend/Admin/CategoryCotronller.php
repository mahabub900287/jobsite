<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCetagory;
use Illuminate\Http\Request;

class CategoryCotronller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = JobCetagory::latest('id')->get();
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Job Category'=>''];
        $this->setPageTitle('Portfolio List');
        return view('backend.pages.job-post-category.index',compact('values','breadcrumb'));
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
            'category_name' => 'required|max:60|unique:job_cetagories,name',
        ]);

        JobCetagory::create([
            'name'             => $request->category_name,
            'status'           => $request->status
        ]);

        toastr()->success('Created Successfully.', 'Success');
        if ($request->submit == 'save') {
            return redirect()->route('admin.cetagory.index');
        } else {
            return back();
        }
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
       $category = JobCetagory::find($id);
       $values = JobCetagory::latest('id')->get();
       $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Portfolio'=>''];
       $this->setPageTitle('Portfolio Edit');
       return view('backend.pages.job-post-category.index',compact('breadcrumb','category','values'));
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
        $category = JobCetagory::find($id);
        $request->validate([
            'category_name' => 'required|max:60|unique:job_cetagories,name,'.$category->id,
        ]);

        $category->update([
            'name'             => $request->category_name,
            'status'           => $request->status
        ]);

        toastr()->success('Updated Successfully.', 'Success');
        if ($request->submit == 'save') {
            return redirect()->route('admin.cetagory.index');
        } else {
            return back();
        }
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
