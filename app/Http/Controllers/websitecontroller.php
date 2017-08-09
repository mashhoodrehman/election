<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Teacher;
use App\School;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Toastr;
use Redirect;
use Storage;

class websiteController extends Controller
{
    public function school()
	{
		return view('Admin.importSchool');
	}

	public function teacher()
	{
		$val = Storage::disk('local')->put('file.txt', 'Contents');
		
		return view('Admin.importTeacher',compact('val'));
	}
	
	public function importTeacher()
	{
		try {
			$file = Input::file('import_file');
			$ext=$file->getClientOriginalExtension();
			if($ext=='csv')
                {
                }
                else
                {   Toastr::warning("Use CSV File Only", $title = 'Alert!', $options = []);
                    return Redirect::back()->with('message', 'Uploaded file extention prohibited'); 
                }
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			
			$data = \Excel::load($path, function($reader) {
			})->get();    
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['name' => $value->name, 'about' => $value->about , 'address' => $value->address , 'city' => $value->city , 'state' => $value->state , 'zip' => $value->zip ];
				}
				$teachers = Teacher::all();
				$d = $data->first();
				
				foreach ($teachers as $teach) {
				// 	if($teach->first() == $data->first()){
				// 	dd("Record is duplicated");
				// }
					$t = DB::table('teachers')->select('name','about','address' , 'city' , 'state' , 'zip')->first();
					
					if($t->name == $d->name || $t->about == $d->about || $t->address == $d->address || $t->city == $d->city || $t->state == $d->state || $t->zip == $d->zip){
						$message = "Teacher Data is dublicate";
         Toastr::warning($message, $title = 'Duplicate', $options = []);
						return redirect()->back();
					}
			
				}
				if(!empty($insert)){
					DB::table('teachers')->insert($insert);

					$message = "Teacher Created succesfuly";
         Toastr::success($message, $title = 'Created', $options = []);
					return redirect()->to('/admin/teachers');
				}
			}
		}
		return back();
		} catch ( \Exception $exp ) {

			$message = "Something Went Wrong!";
			Toastr::warning($message, $title = 'Error', $options = []);
						return redirect()->back();

        }
	}


	public function importSchool()
	{
		try {
			$file = Input::file('import_file');
			$ext=$file->getClientOriginalExtension();
			if($ext=='csv')
                {
                }
                else
                {   Toastr::warning("Use CSV File Only", $title = 'Alert!', $options = []);
                    return Redirect::back()->with('message', 'Uploaded file extention prohibited'); 
                }
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = \Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['name' => $value->name, 'about' => $value->about , 'address' => $value->address , 'city' => $value->city , 'state' => $value->state , 'zip' => $value->zip ];
				}
				$schools = School::all();
				$d = $data->first();
				
				foreach ($schools as $sch) {
				// 	if($teach->first() == $data->first()){
				// 	dd("Record is duplicated");
				// }
					$t = DB::table('schools')->select('name','about','address' , 'city' , 'state' , 'zip')->first();
					
					if($t->name == $d->name || $t->about == $d->about || $t->address == $d->address || $t->city == $d->city || $t->state == $d->state || $t->zip == $d->zip){
						$message = "Schools Data is dublicate";
         Toastr::warning($message, $title = 'Duplicate', $options = []);
						return redirect()->back();
					}
			
				}
				if(!empty($insert)){
					DB::table('schools')->insert($insert);
					$message = "School Created succesfuly";
         Toastr::success($message, $title = 'Created', $options = []);
					return redirect('/admin/schools');
				}
			}
		}
		return back();
		} catch ( \Exception $exp ) {
            $message = "Something Went Wrong!";
			Toastr::warning($message, $title = 'Error', $options = []);
						return redirect()->back();
        }
	}



}


	
