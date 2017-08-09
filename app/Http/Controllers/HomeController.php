<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\School;
use App\User;
use App\Contents;
use carbon\carbon;
use Redirect;
use Toastr;
use Alert;
use Auth;
use DB;
use Illuminate\Support\Collection;
use App\QuestionnaireTeacherUser;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()){
            if(Auth::user()->role == "admin"){
                return redirect('/admin/dashboard');
            }elseif(Auth::user()->role == "student" || Auth::user()->role == "parent"){
                $states = DB::table('states')->pluck('state_name','state_id')->all();
            $teachers = Teacher::orderBy('id','DESC')->with('schools')->get();
            return view('user.home.home', compact('states','teachers'));
            }
            else{
                
                $teachers = Teacher::orderBy('id','DESC')->with('schools')->get();
            
                $states = DB::table('states')->pluck('state_name','state_id')->all();

            
            return view('user.home.home', compact('states','teachers'));
            }
        }
        else
        {
            

            $teachers = Teacher::orderBy('id','DESC')->with('schools')->take(8)->get();
           
            
                     

            $states = DB::table('states')->pluck('state_name','state_id')->all();
            
            return view('user.home.home', compact('states','teachers'));
        }
       
    }


    public function myformAjax($id)

    {

        $cities = DB::table('cities')

                    ->where('state_id',$id)

                    ->pluck('city_name','city_id')->all();

        return json_encode($cities);

    }
    public function about()
    {
        return view('user.aboutus.aboutus');

    }

    public function viewpolicy()
    {
        try{
            
            $content_obj =  Contents::first();
            if(isset($content_obj)){
                $data=$content_obj->policy;
                return view('user.contents.policy',compact('data'));
            }else{
                $data="<h1>No Content Found!</h1>";
                return view('user.contents.policy',compact('data'));
            }               

          
        } catch ( \Exception $exp ) {
            Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }
    }
    public function viewterms()
    {
        try{
            
            $content_obj =  Contents::first();
            if(isset($content_obj)){
                $data=$content_obj->terms;
                return view('user.contents.terms',compact('data'));
            }else{
                $data="<h1>No Content Found!</h1>";
                return view('user.contents.terms',compact('data'));
            }               

          
        } catch ( \Exception $exp ) {
            Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }
    }
    public function viewfaqs()
    {
        try{
            
            $content_obj =  Contents::first();
            if(isset($content_obj)){
                $data=$content_obj->faqs;
                return view('user.contents.faqs',compact('data'));
            }else{
                $data="<h1>No Content Found!</h1>";
                return view('user.contents.faqs',compact('data'));
            }               

          
        } catch ( \Exception $exp ) {
            Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());

        }
    }
    public function search(Request $request){
        
        try{

            // dd($request->state);
            // School data
                $query = School::orderBy('id','DESC');

                if ($request->keyword) {
                    $name = $request->keyword;

                $query->where(function ($q) use ($name) {
                $q->where('name', 'like', "$name%");
                });

                }

                if ($request->city) {
                $query->where('city', '=' , $request->city);
                }
                
                if (!empty($request->state)) {
                $query->where('state', '=',$request->state);
                
                }
                if ($request->zip) {
                $query->where('zip', $request->zip);
                }

                
                $schools = $query->paginate(5);
               
                $schools->setPath(url('/search'))->appends($request->all());
            
                // dd($request);
                // $teach = $schools->with('teachers')->all();
                                
                // Teacher data
                $quer = Teacher::orderBy('id','DESC');;

                if ($request->keyword) {
                    $name = $request->keyword;
                $quer->where(function ($q) use ($name) {
                $q->where('name', 'like', "$name%");
                });
                }

                if ($request->city) {
                $quer->where('city', '=' , $request->city);
                }
                
                if ($request->state) {

                $quer->where('state', '=',$request->state);
                }
                if ($request->zip) {
                $quer->where('zip', $request->zip);
                }

                $teachers = $quer->paginate(5,['*'],'teacher-list');
                 $teachers->setPath(url('/search'))->appends($request->all());
                if(!($teachers->first()) && !($schools->first())){
                    /*$message = "no record was founded!";
                    Toastr::warning($message, $title = 'Alert', $options = []);*/
                    $states = DB::table('states')->pluck('state_name','state_id')->all();
                    return view('user.Search.search',compact('teachers', 'schools','states'));
                }
                if(empty($request->keyword) && empty($request->city) && empty($request->state) && empty($request->zip)){

                /*$message = "Enter something to search";
                Toastr::warning($message, $title = 'Error', $options = []);*/
                $states = DB::table('states')->pluck('state_name','state_id')->all();
                return view('user.Search.search',compact('teachers','schools','states'));
            }
            $counts = $teachers->count();
            $counts += $schools->count();
             $message = $counts;
                Toastr::success($message, $title = 'Record found', $options = []);
                $states = DB::table('states')->pluck('state_name','state_id')->all();
                return view('user.Search.search',compact('teachers', 'schools','states'))->withInput($request->input());
                

                
        } catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        }


    }     
   public function school_detail($id)
   {
        try{
            $school = School::with('teachers')->find($id);
           
            if(isset($school)){
                return view('user.school.viewschool', compact('school'));
            }
            else{
                Toastr::warning("School does not exist.", $title = 'Not found');
                return Redirect::back();
            }



        } catch ( \Exception $exp ) {
        Toastr::error($exp->getMessage(), $title = 'Error');
        return redirect ()->back()->with('status', $exp->getMessage());
        }    

   }     
   public function teacher_detail($id)
   {
        try{
        $teacher = Teacher::with('schools')->find($id);
        if(isset($teacher)){
        $rating = DB::table('questionnaire_teacher_users')
            ->join('teachers', 'questionnaire_teacher_users.teachers_id', '=', 'teachers.id')
            ->join('users', 'questionnaire_teacher_users.users_id', '=', 'users.id')
            ->select('questionnaire_teacher_users.*', 'teachers.*','users.*')
            ->where('teachers.id','=',$id)
            ->get();
           
            $studentRating = DB::table('questionnaire_teacher_users')
            ->join('teachers', 'questionnaire_teacher_users.teachers_id', '=', 'teachers.id')
            ->join('users', 'questionnaire_teacher_users.users_id', '=', 'users.id')
            ->select('questionnaire_teacher_users.*', 'teachers.*','users.*')
            ->where('teachers.id','=',$id)
            ->where('users.role','=','student')
            ->paginate(1,['*'],'sR');
            $parentRating = DB::table('questionnaire_teacher_users')
            ->join('teachers', 'questionnaire_teacher_users.teachers_id', '=', 'teachers.id')
            ->join('users', 'questionnaire_teacher_users.users_id', '=', 'users.id')
            ->select('questionnaire_teacher_users.*', 'teachers.*','users.*')
            ->where('teachers.id','=',$id)
            ->where('users.role','=','parent')
            ->paginate(1,['*'],'pR');
        // $rating = QuestionnaireTeacherUser::where('teachers_id', $id)->get();
        $st_rate = null;
        $pt_rate = null;
        $counter1 = 0;
        $counter2 = 0;
        foreach ($rating as $rate) {
            if($rate->role=="student"){
                $st_rate += $rate->gradeValue; 
                $counter1++;
            }
            if($rate->role=="parent"){
                $pt_rate += $rate->gradeValue;
                $counter2++; 
            }
        }

        
       

        //From Student Grading
        if(isset($st_rate)){
            $sRate = $st_rate/$counter1;
            $sRate = (int)$sRate;
            
            if($sRate >=93 && $sRate<=100){
            $sGrade = "A";
        }
        if($sRate >=90 && $sRate<=92){
            $sGrade = "A-";
        }
        if($sRate >=87 && $sRate<=89){
            $sGrade = "B+";
        }
        if($sRate >=83 && $sRate<=86){
            $sGrade = "B";
        }
        if($sRate >=80 && $sRate<=82){
            $sGrade = "B-";
        }
        if($sRate >=77 && $sRate<=79){
            $sGrade = "C+";
        }
        if($sRate >=73 && $sRate<=76){
            $sGrade = "C";

        }
        if($sRate >=70 && $sRate<=72){
            $sGrade = "C-";
        }
        if($sRate >=67 && $sRate<=69){
            $sGrade = "D+";
        }
        if($sRate >=60 && $sRate<=66){
            $sGrade = "D";
        }
        if($sRate >=0 && $sRate<=59){
            $sGrade = "F";
        }
        }

        //From Parent Rating
        if(isset($pt_rate)){
            $pRate = $pt_rate/$counter2;
            $pRate = (int)$pRate;
            if($pRate >=93 && $pRate<=100){
            $pGrade = "A";
        }
        if($pRate >=90 && $pRate<=92){
            $pGrade = "A-";
        }
        if($pRate >=87 && $pRate<=89){
            $pGrade = "B+";
        }
        if($pRate >=83 && $pRate<=86){
            $pGrade = "B";
        }
        if($pRate >=80 && $pRate<=82){
            $pGrade = "B-";
        }
        if($pRate >=77 && $pRate<=79){
            $pGrade = "C+";
        }
        if($pRate >=73 && $pRate<=76){
            $pGrade = "C";
        }
        if($pRate >=70 && $pRate<=72){
            $pGrade = "C-";
        }
        if($pRate >=67 && $pRate<=69){
            $pGrade = "D+";
        }
        if($pRate >=60 && $pRate<=66){
            $pGrade = "D";
        }
        if($pRate >=0 && $pRate<=59){
            $pGrade = "F";
        }
        }
        
        return view('user.teacher.viewteacher', compact('teacher','pGrade','sGrade','parentRating','studentRating'));
        }else{
            return Redirect::back();
        }
        } 

        catch ( \Exception $exp ) {
        return redirect ()->back()->with('status', $exp->getMessage());
        } 
   }

     

    public function getSchool(Request $request){
        $schools = School::orderBy('id','DESC')->select('*')->where('state','=',$request->stateNameSearch)->paginate(4);
        
        $states = DB::table('states')->pluck('state_name','state_id')->all();
        $teachers = DB::table('teachers')->select('*')->where('state','=',$request->stateNameSearch)->paginate(4);
        
        return view('user.Search.search',compact('teachers', 'schools','states'));
    }    
   

}


