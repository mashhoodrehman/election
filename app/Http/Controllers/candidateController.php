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
use App\Candidate;
use App\User;
class candidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $result = DB::table('candidates')
            ->join('users', 'candidates.users_id', '=', 'users.id')
            ->select('users.*','candidates.*')
            ->paginate(5);
      
        return view('Admin.candidates',compact('result'));
        } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
        }

    }
    public function editcandidate($id)
    {

            $data['result'] = Candidate::find($id);
   
               return view('Admin.editcandidate',$data);
           
        
        }
        

    public function addcandidate()
    {   
       
        $users = User::all();
        return view('admin.addcandidate',compact('users'));

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
        }

           $candidate = new Candidate;
             $candidate->users_id = $request->input('user'); 
             $candidate->about = $request->input('about');
             $candidate->address = $request->input('address');
             $candidate->city = $request->input('city');
             $candidate->state = $request->input('state');
             $candidate->zip = $request->input('zip');
             
             
             
            
                    $candidate->save();
                        Toastr::success("candidate Created successfully", $title = 'Created!', $options = []);
                         return redirect('/admin/candidates');
                     

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
        $candidate = Candidate::with('users')->find($id);    
        return view('Admin.viewcandidate', compact('candidate'));   
        } catch ( \Exception $exp ) {
            return redirect ()->back()->with('status', $exp->getMessage());
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
            }         
           $candidate = Candidate::find($id);
             $candidate->about = $request->input('about');
             $candidate->address = $request->input('address');
             $candidate->city = $request->input('city');
             $candidate->state = $request->input('state');
             $candidate->zip = $request->input('zip');
                $candidate->save();
                Toastr::success("candidate Updated successfully", $title = 'Created!', $options = []);
                 return redirect('/admin/candidates');
                      

             

          
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
        $result = Candidate::find($id);
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
