<?php

namespace App\Http\Controllers;

use App\School;
use Auth;
use Illuminate\Http\Request;
use carbon\carbon;
use Redirect;
use Toastr;
use Alert;
use DB;
class UserSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
        try{
            if (isset($request)) {
                 $validator =  validator($request->all(), [
                'name'=>'required|max:255',
                'address'=>'required|max:255',
                'city'=>'required|max:255',
                'state'=>'required|max:255',
                ]);
                  if ($validator->fails()) {
                        $message = $validator->messages();
                        return back()->withErrors($validator)->withInput();
                    }


                 $school_obj = new School;
                 $school_obj->name = $request->input('name');
                 $school_obj->about = $request->input('about');
                 $school_obj->address = $request->input('address');
                 $school_obj->city = $request->input('city');
                 $school_obj->url = $request->input('url');
                 $school_obj->number = $request->input('number');
                 $school_obj->state = $request->input('state');/*
                 $school_obj->zip = $request->input('zip');*/
                 $school_obj->addedby = Auth::user()->id;
                 
                 
                $file = $request->file('logo');
                  
                if (!empty($file)) {

                    $ext=$file->getClientOriginalExtension();
                    if($ext=='jpg' || $ext=='png' || $ext=='jpeg')
                    {
                        $newFilename ="s_img_".time()."_".$file->getClientOriginalName();
                        
                        $destinationPath = public_path() . '/uploads/schoollogo';
                        $file->move($destinationPath, $newFilename);
                        $picPath = $newFilename;
                        $school_obj->logo = $picPath;


                    }
                    else
                    {   
                        Toastr::warning("Uploaded file extention prohibited", $title = 'Alert!', $options = []);
                        return Redirect::back()->with('message', 'Uploaded file extention prohibited'); 
                    }
                }
                if ($school_obj->save()) {
                    Toastr::success("School Created successfully", $title = 'Created!', $options = []);
                    return Redirect::back();
                }
                else
                {
                    Toastr::error("school not created!", $title = 'Alert!', $options = []);
                    return Redirect::back()->with('message', 'Please Upload Logo ');
                }                

            } 
            } 
            catch ( \Exception $exp ) {
            Toastr::warning("School could not be added!", $title = 'Created!', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }        
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
