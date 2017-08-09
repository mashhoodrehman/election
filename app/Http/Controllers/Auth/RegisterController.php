<?php

namespace App\Http\Controllers\Auth;
use DB;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\User;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Toastr;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fName' => 'string|max:255',
            'lName' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'fName'=> $data['fName'],
            'lName'=> $data['lName'],
         'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
            'role' => $data['role'],
             ]);
        return $user;

    }


       public function register(Request $request)
{
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails())
    {
        $this->throwValidationException($request, $validator);
    }

    DB::beginTransaction();
    try
    {
        $user = $this->create($request->all());

        // After creating the user send an email with the random token generated in the create method above
        $email = new EmailVerification($user);
        Mail::to($user->email)->send($email);
        DB::commit();
        
        return back()->with('activationlink','A verification link has been sent to your inbox. Please click on the link to verify your email and activate your account.');
    }
    catch(Exception $e)
    {
        DB::rollback();
        return back();
    }
}

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
       // The verified method has been added to the user model and chained here
       // for better readability
        
       User::where('email_token', $token)->firstOrFail()->verified();

       return redirect('/')->with('activated','Your account has been verified. You can now login to continue.');
    }
}
