<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\User;
use App\Questionnaires;
use App\QuestionnaireTeacherUser;
use App\Mail\RatingConfirmation;
use DB;
use Toastr;
use Mail;
use Auth;


use Illuminate\Http\Request;

class TeacherRating extends Controller
{
    public function index($id){
    	$teacher = Teacher::with('schools')->find($id);
    	$questions = Questionnaires::with('answers')->take(4)->get();
    	$rating = DB::table('questionnaire_teacher_users')
            ->join('teachers', 'questionnaire_teacher_users.teachers_id', '=', 'teachers.id')
            ->join('users', 'questionnaire_teacher_users.users_id', '=', 'users.id')
            ->select('questionnaire_teacher_users.*', 'teachers.*','users.*')
            ->where('teachers.id','=',$id)
            ->get();
    	// $rating = QuestionnaireTeacherUser::where('teachers_id', $id)->get();
    	$st_rate = null;
    	$pt_rate = null;
    	$counter1 = 0;
    	$counter2 = 0;
    	foreach ($rating as $rate) {
    		if($rate->email == Auth::user()->email){
    			Toastr::warning("You already Rated this teacher", $title = 'Alert!', $options = []);
    			return redirect()->back();
    		}
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
    	
    	
    	return view('user.rating.teacher-rating',compact('teacher','questions','sGrade','pGrade'));
    }

    public function teacherRate(Request $request){
    	$sum=null;
    	$count = 0;
    	foreach ($request->ans as $value) {
    		$sum += $value;
    		$count++;
    	}
    	$count *=10; 
    	
    	$result=($sum/$count)*100;
        $result = (int)($result);

    	if($result >=93 && $result<=100){
    		$grade = "A";
    	}
    	if($result >=90 && $result<=92){
    		$grade = "A-";
    	}
    	if($result >=87 && $result<=89){
    		$grade = "B+";
    	}
    	if($result >=83 && $result<=86){
    		$grade = "B";
    	}
    	if($result >=80 && $result<=82){
    		$grade = "B-";
    	}
    	if($result >=77 && $result<=79){
    		$grade = "C+";
    	}
    	if($result >=73 && $result<=76){
    		$grade = "C";
    	}
    	if($result >=70 && $result<=72){
    		$grade = "C-";
    	}
    	if($result >=67 && $result<=69){
    		$grade = "D+";
    	}
    	if($result >=60 && $result<=66){
    		$grade = "D";
    	}
    	if($result >=0 && $result<=59){
    		$grade = "F";
    	}
    	$questionTeacher = new QuestionnaireTeacherUser;
    	$questionTeacher->teachers_id = $request->t_id;
    	$questionTeacher->users_id = $request->u_id;
    	$questionTeacher->grade = $grade;
    	$questionTeacher->gradeValue = $result;
    	$questionTeacher->save();
    	$teacher = Teacher::find($request->t_id)->select('name')->first();
    	$user = User::find($request->u_id);
    	$data[] = $questionTeacher;
    	$data[] = $teacher;
    	$data[] = $user;
    	$email = new RatingConfirmation($data);
    	
        Mail::to($user->email)->send($email);
        Toastr::success("We sent you an Email", $title = 'Success', $options = []);
        return redirect('teacher-detail/'.$request->t_id)->with('data', ['some kind of data',$grade]);
    }
}
