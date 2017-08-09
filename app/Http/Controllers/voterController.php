<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use carbon\carbon;
use Redirect;
use Toastr;
use Alert;
use DB;
use App\User;
use App\Voter;
class voterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $result = DB::table('voters')
            ->join('users', 'voters.users_id', '=', 'users.id')
            ->select('users.*','voters.*')
            ->paginate(5);
       
        return view('Admin.voters',compact('result'));
        } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
        }
        
    }
    public function editvoter($id)
    {
        try{
        $data['result'] = Voter::with('users')->find($id);

        return view('Admin.editvoter',$data);
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
            if (isset($request)) {
                 $validator =  validator($request->all(), [
                ]);
                  if ($validator->fails()) {
                $message = $validator->messages();
                    if ($message->first()=="The name field is required."){
                        $message = "The field is required";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
                    else {
                        $message ="The logo must be a file of type: jpeg, jpg, png.";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
            }


                 $voter = new Voter;
                 $voter->users_id = $request->input('user');
                 $voter->about = $request->input('about');
                 $voter->address = $request->input('address');
                 $voter->city = $request->input('city');
                 $voter->state = $request->input('state');
                 $voter->zip = $request->input('zip');
                 $voter->save();
                 Toastr::success("voter Created successfully", $title = 'Created!', $options = []);
                 return redirect('/admin/voters');
                       

                                } 
            } catch ( \Exception $exp ) {
            Toastr::warning("voter could not be added!", $title = 'Error!', $options = []);
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
        $voter = Voter::with('users')->find($id);
      return view('Admin.viewvoter', compact('voter'));
      } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
        }
    }
    public function addvoter(){
        $users = User::all();
        return view('admin.addvoter',compact('users'));

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
        

        if (isset($request)) {
            $validator =  validator($request->all(), [
                'name'=>'required|max:255',
                'about'=>'required|max:255',
                'address'=>'required|max:255',
                'city'=>'required|max:255',
                'state'=>'required|max:255',
                'zip'=>'required|min:1',
                'logo'=>'required',
                ]);
                  if ($validator->fails()) {
                $message = $validator->messages();
               
                    if ($message->first()=="The name field is required."){
                        $message = "The field is required";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
                    else {
                        $message ="The logo must be a file of type: jpeg, jpg, png.";
                        Toastr::warning($message, $title = 'Error', $options = []);
                        return back()->withErrors($validator)->withInput();
                        }
            }
           $voter_obj = voter::find($id);
             $voter_obj->name = $request->input('name');
             $voter_obj->about = $request->input('about');
             $voter_obj->address = $request->input('address');
             $voter_obj->city = $request->input('city');
             $voter_obj->state = $request->input('state');
             $voter_obj->zip = $request->input('zip');
             
             
            $file = $request->file('logo');
              
            if (!empty($file)) {

                $ext=$file->getClientOriginalExtension();
                if($ext=='jpg' || $ext=='png' || $ext=='gif')
                {
                    $newFilename ="s_img_".time()."_".$file->getClientOriginalName();
                    
                    $destinationPath = public_path() . '/uploads/voterlogo';
                    $file->move($destinationPath, $newFilename);
                    $picPath = $newFilename;
                    $voter_obj->logo = $picPath;
                }
                else
                {   Toastr::warning("Uploaded file extention prohibited", $title = 'Alert!', $options = []);
                    return Redirect::back()->with('message', 'Uploaded file extention prohibited'); 
                }
            }
            if ($voter_obj->save()) {
                Toastr::success("voter Updated successfully", $title = 'Updated!', $options = []);
                 return redirect('/admin/voters');
             }
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
        $result = Voter::find($id);
        if ($result->delete()) {
            return response()->json(['response' => 'ok','id'=>$id]);
        }
        else{
            return response()->json(['response' => 'error']);
        }
        } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
        }
    }
}
