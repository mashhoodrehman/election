<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaires;
use App\Answer;
use DB;
use Redirect;
use Toastr;
use Alert;
use Validator;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = DB::table('questionnaires')->paginate(10);
        return view('Admin.questions' , compact('question'));


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
    public function editquestion($id)
    {
        
       $data['result'] = Questionnaires::find($id);
       $data['answers']  =  Answer::where('question_id_fk', '=', $id)->get();
        
       if (isset($data['result'])) {
        return view('Admin.editquestion',$data);
       }else{
        Toastr::warning("Question does not exist!", $title = 'Error!', $options = []);
        return redirect()->back();
       }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        /*dd(count($request->answers));*/
        if (isset($request)) {
            $this->validate($request, [
                'question' => 'required|max:255'
            ]);             
            $question = new Questionnaires;
            
            $question->question = $request->question;
            if($question->save()){
                for ($i=0; $i <count($request->answers) ; $i++) { 
                  $answer = new Answer;
                  $answer->answer=$request->answers[$i];
                  $answer->weight=$request->weights[$i];
                  $answer->question_id_fk=$question->id;
                  $answer->save();

                }

                $message = "Questions Created succesfuly";
                Toastr::success($message, $title = 'Created', $options = []);
                return redirect('/admin/questions');
            }
            else{
                Toastr::success("Question not created", $title = 'Error', $options = []);
                return Redirect::back();          
            }
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
        $question = Questionnaires::find($id);
        $answer  =  Answer::where('question_id_fk', '=', $id)->get();
       if (isset($question)) {
         return view('Admin.viewquestion', compact('question','answer'));
       }
       else{
        Toastr::warning("Question does not exist!", $title = 'Error!', $options = []);
        return redirect()->back();
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
            $this->validate($request, [
                'question' => 'required|max:255'
            ]);               
           $question_obj = Questionnaires::find($id);
                                
            $question_obj->question = $request->input('question');
            if ($question_obj->save()) {
                for ($i=0; $i <count($request->answers) ; $i++) {

                    if (isset($request->id[$i]) && $request->id[$i] !="") {
                        $answer_obj = Answer::find($request->id[$i]);
                         
                          $answer_obj->answer=$request->answers[$i];
                          $answer_obj->weight=$request->weights[$i];
                          $answer_obj->question_id_fk=$id;
                          $answer_obj->save();                       
                     }else{
                        $new_answer=new Answer;
                          $new_answer->answer=$request->answers[$i];
                          $new_answer->weight=$request->weights[$i];
                          $new_answer->question_id_fk=$id;
                          $new_answer->save();                         
                     } 
        }                
                Toastr::success("Question Updated successfully", $title = 'Updated!', $options = []);
                 return redirect('/admin/questions');
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
        $result = Questionnaires::find($id);
        if ($result->delete()) {
            return response()->json(['response' => 'ok','id'=>$id]);
        }
        else{
            return response()->json(['response' => 'error']);
        }
    }
}
