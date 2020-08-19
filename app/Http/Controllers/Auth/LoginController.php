<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Auth;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     // dd($request->all());

    //     if (
    //     Auth::attempt(['email' => $request->email,
    //     'password' => $request->password]))
    //     {
    //         $User = User::where('email', $request->email)->first();
    //         if ($user->is_admin()) {
    //             return redirect('admin')->route('admin');
    //         }
    //         return redirect('home')->route('home');
    //     }

    //     return redirect()->back();
    // }

     public function getAllusers()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function postLogin(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'


        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }
        $user=new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');


        $user->save();
        return response()->json(['user' => $user],200);
    }

}
