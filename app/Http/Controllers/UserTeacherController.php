<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\School;
use Auth;
use Illuminate\Http\Request;
use carbon\carbon;
use Redirect;
use Toastr;
use Alert;
use DB;


class UserTeacherController extends Controller
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
                'name'=>'required|max:255',/*
                'address'=>'required|max:255',
                'city'=>'required|max:255',
                'state'=>'required|max:255',*/
                'school_id_fk'=>'required|min:1',
                ]);
                  if ($validator->fails()) {
                        $message = $validator->messages();
                    if ($message->first()){
                        /*$message = "The field is required";
                        Toastr::warning($message, $title = 'Error', $options = []);*/
                        return back()->withErrors($validator)->withInput();
                        }
            }

            

           $teacher_obj = new Teacher;
             $teacher_obj->name = $request->input('name');
             $teacher_obj->about = $request->input('about');
             $teacher_obj->subject = $request->input('subject');
             $teacher_obj->grade = $request->input('grade');
/*             $teacher_obj->address = $request->input('address');
             $teacher_obj->city = $request->input('city');
             $teacher_obj->state = $request->input('state');
             $teacher_obj->zip = $request->input('zip');*/
             $teacher_obj->addedby = Auth::user()->id;
             $teacher_obj->school_id_fk = $request->input('school_id_fk');
             







             
             
            $file = $request->file('image');
              
            if (!empty($file)) {

                $ext=$file->getClientOriginalExtension();
                if($ext=='jpg' || $ext=='png' || $ext=='jpeg')
                {
                    $newFilename ="t_img_".time()."_".$file->getClientOriginalName();
                    
                    $destinationPath = public_path() . '/uploads/teacher_imgs';
                    $file->move($destinationPath, $newFilename);
                    $picPath = $newFilename;
                    $teacher_obj->image = $picPath;

                  
                }
                else
                {    
                    Toastr::warning("Uploaded file extention prohibited", $title = 'Alert!', $options = []);
                    return Redirect::back()->with('message', 'Uploaded file extention prohibited'); 
                }
            }
            if ($teacher_obj->save()) {
                Toastr::success("Teacher Created successfully", $title = 'Created!', $options = []);
                 return Redirect::back();
             }  
        }        
      } catch ( \Exception $exp ) {
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
