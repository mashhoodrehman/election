<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Toastr;
use Alert;
use App\City;
use App\State;
use App\School;
use Redirect;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  


        try {
        $user = DB::table('users')->where('status' , '=' , "on")->where('role' , '!=' , 'admin')->paginate(5);
        return view('Admin.users' , compact('user'));
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }
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
            $validator = validator($request->all(), [
            'fName'=>'required|max:255',
            'lName'=>'required|max:255',
            'email'=>'required|unique:users,email',
            'password' => 'required|min:6'
            ]);
            if ($validator->fails()) {
                $message = $validator->messages();
                    if($message->first()=="The email has already been taken."){
                        $message = "You Entred Dublictae Email";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
                    elseif ($message->first()=="The password must be at least 6 characters."){
                        $message = "Kindly enter 6 characters for password";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
                    else {
                        $message = "The field is required";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
            }
            $user = new User();
            $user->fName = $request->fName;
            $user->lName = $request->lName;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
            $user->activated = $request->activate;
            $user->save();
            $message = "User Created succesfuly";
            Toastr::success($message, $title = 'Created', $options = []);
            return redirect('admin/user');
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
        try{
          if ($id == Auth::user()->id) {
              $user = User::find($id);
              return view ('Admin/profile' , compact('user'));
          } else {
             return Redirect::back();
          }
          

        } catch ( \Exception $exp ) {
        return redirect()->back()->with('status', $exp->getMessage());
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
        try{
        $user = User::find($id);
        return view('Admin.editUser' , compact('user'));
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }
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
        try{
            $validator = validator($request->all(), [
            'fName'=>'required|max:255',
            'lName'=>'required|max:255',
            'email'=>'required|',
             'password' => 'required|min:6'
            ]);
            if ($validator->fails()) {
                     $message = $validator->messages();
                     if($message->first()=="The email has already been taken."){
                        $message = "You Entred Dublictae Email";
                         Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                     }
                    elseif ($message->first()=="The password must be at least 6 characters."){
                        $message = "Kindly enter 6 characters for password";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                     }
                    else {
                        $message = "The field is required";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                    }
            }
           
        $user = User::find($id);
        $user->fName = $request->fName;
        $user->lName = $request->lName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $message = "User Edit Succesfully";
        Toastr::success($message, $title = 'Edit', $options = []);
        return redirect('admin/user');
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
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
        try{
        $user = User::find($id);
        $user->status = "off";
        $user->save();
        return response()->json(['response' => 'ok','id'=>$id]);
        return response()->json(['response' => 'error']);
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }
    }


    public function profile($id){
      
      try{
        if($id ==Auth::user()->id){
          $schools=School::all();
          $user  =  User::with('school')->find($id);
         /* dd($user);*/
          $states = DB::table('states')->pluck('state_name','state_id')->all();

          return view('user.User.profile',compact('user','states','schools'));

        }
        return redirect('/');
        

      } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }

    }


    public function userUpdate(Request $request,$id){
        
        try{

        $user = User::find($id);
        
        
       
        $user->fName = $request->fName;
        $user->lName = $request->lName;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->grade = $request->grade;
        $user->school_id_fk = $request->school_id_fk;
        $file = $request->file('file');
        
        if (!empty($file)) {

                    $ext=$file->getClientOriginalExtension();

                    if($ext=='jpg' || $ext=='png' || $ext=='jpeg')
                    {
                        $newFilename ="s_img_".time()."_".$file->getClientOriginalName();
                        
                        $destinationPath = public_path() . '/uploads/User';
                        $file->move($destinationPath, $newFilename);
                        $picPath = $newFilename;
                        $user->image = $picPath;

                    }
                }
            if ($user->save()) {
              Toastr::success("Profile Updated successfully", $title = 'Updated!', $options = []);
              return Redirect::back();
              }
              else
              {
              Toastr::error("User not Updated!", $title = 'Alert!', $options = []);
              return  redirect()->back()->with('message', 'Please Upload Image ');
              }        
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }


    }
    public function addschool()
    {
      $states = DB::table('states')->pluck('state_name','state_id')->all();
      
      return view('user.school.addschool',compact('states'));
      
    }
    public function addteacher($id= null)
    {
     
        try{
        $states = DB::table('states')->pluck('state_name','state_id')->all();
        $schools=School::all();
        
        if ($schools->first()) {
             return view('user.teacher.addteacher',compact('states','schools','id'));
           
        }else{
            Toastr::warning("Please add school before adding teacher!", $title = 'Alert!', $options = []);
            return redirect('/');
        }
         } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
        }
    }
}
