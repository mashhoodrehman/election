<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;
use DB;
use Redirect;
use Toastr;
use Alert;
use Validator;
class ContentController extends Controller
{
	 
	 public function viewpolicy()
	 {
        try{
	    	
	    	$content_obj =  Contents::first();
			if(isset($content_obj)){
				$data=$content_obj->policy;
				return view('Admin.content.privacy',compact('data'));
			}else{
				$data=null;
				return view('Admin.content.privacy',compact('data'));
			}	            
        } 
        catch ( \Exception $exp ) {
        	Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 	
	 }	 
	 public function addpolicy(Request $request)
	 {
        try{
	        if (isset($request)) {
	            $this->validate($request, [
	                'policy' => 'required'
	            ]);
	            $content_obj =  Contents::first();
	            
	           if (isset($content_obj)) {
	           		$ontent_policy=$content_obj;
	           		$ontent_policy->policy=$request->policy;
		            if($ontent_policy->save()){
		            	
		                $message = "Content Updated succesfuly";
		                Toastr::success($message, $title = 'Updated', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }	           		
	           }
	           else
	           {
		            $content = new Contents;
		            $content->policy=$request->policy;

		            if($content->save()){
		            	
		                $message = "Content Created succesfuly";
		                Toastr::success($message, $title = 'Created', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }

	           }

	        }
        } catch ( \Exception $exp ) {
        	/*Toastr::success($exp->getMessage(), $title = 'Error', $options = []);*/
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 }	 
	 public function viewterms()
	 {
        try{
	    	
	    	$content_obj =  Contents::first();
			if(isset($content_obj)){
				$data=$content_obj->terms;
				return view('Admin.content.terms',compact('data'));
			}else{
				$data=null;
				return view('Admin.content.terms',compact('data'));
			}	            
        } 
        catch ( \Exception $exp ) {
        	Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 	
	 }	 
	 public function addterms(Request $request)
	 {
        try{
	        if (isset($request)) {
	            $this->validate($request, [
	                'terms' => 'required'
	            ]);
	            $content_obj =  Contents::first();
	            
	           if (isset($content_obj)) {
	           		$ontent_policy=$content_obj;
	           		$ontent_policy->terms=$request->terms;
		            if($ontent_policy->save()){
		            	
		                $message = "Content Updated succesfuly";
		                Toastr::success($message, $title = 'Updated', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }	           		
	           }
	           else
	           {
		            $content = new Contents;
		            $content->terms=$request->terms;

		            if($content->save()){
		            	
		                $message = "Content Created succesfuly";
		                Toastr::success($message, $title = 'Created', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }

	           }

	        }
        } catch ( \Exception $exp ) {
        	/*Toastr::success($exp->getMessage(), $title = 'Error', $options = []);*/
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 }	 
	 public function viewfaqs()
	 {
        try{
	    	
	    	$content_obj =  Contents::first();
			if(isset($content_obj)){
				$data=$content_obj->faqs;
				return view('Admin.content.faqs',compact('data'));
			}else{
				$data=null;
				return view('Admin.content.faqs',compact('data'));
			}	            
        } 
        catch ( \Exception $exp ) {
        	Toastr::success($exp->getMessage(), $title = 'Error', $options = []);
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 	
	 }	 
	 public function addfaqs(Request $request)
	 {
        try{
	        if (isset($request)) {
	            $this->validate($request, [
	                'faqs' => 'required'
	            ]);
	            $content_obj =  Contents::first();
	            
	           if (isset($content_obj)) {
	           		$ontent_policy=$content_obj;
	           		$ontent_policy->faqs=$request->faqs;
		            if($ontent_policy->save()){
		            	
		                $message = "Content Updated succesfuly";
		                Toastr::success($message, $title = 'Updated', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }	           		
	           }
	           else
	           {
		            $content = new Contents;
		            $content->faqs=$request->faqs;

		            if($content->save()){
		            	
		                $message = "Content Created succesfuly";
		                Toastr::success($message, $title = 'Created', $options = []);
		                return redirect::back();
		            }
		            else{
		            	
		                Toastr::success("Content not created", $title = 'Error', $options = []);
		                return Redirect::back();          
		            }

	           }

	        }
        } catch ( \Exception $exp ) {
        	/*Toastr::success($exp->getMessage(), $title = 'Error', $options = []);*/
            return redirect ()->back()->with('status', $exp->getMessage());
        }	 	
	 }

}
