<?php

namespace App\Http\Controllers;
use App\Election;
use DB;

use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index(){
    	return view('admin.addElection');
    }

    public function addElection(Request $request){
    	$election = new Election;
    	$election->election_Date = $request->edate;
    	$election->start_Time = $request->startTime;
    	$election->end_Time = $request->endTime;
    	$election->result = $request->result;
    	$election->save();
    	return redirect('/admin/dashboard');
    }
    public function manageElection(){
    	$elections = DB::table('elections')->paginate(4);
    	return view('admin.election' , compact('elections'));
    }

    public function electionView($id){
    	$election = Election::find($id);
    	return view('admin.viewElection' , compact('election'));
    }

    public function electionEdit($id){
        $election = Election::find($id);
        return view('admin.viewElection' , compact('election'));
    }    

    
}
