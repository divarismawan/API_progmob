<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
class AuthController extends Controller
{

    protected $successStatus=200;
    // Login

    public function login(){ 

        // return request('user_pass');
        if(Auth::attempt(['user_email' => request('user_email'), 'password' => request('user_pass')])){ 
            $user = Auth::user(); 
            $user->token=  $user->createToken('MyApp')-> accessToken; 
            return response()->json($user, $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }



    // Register
    public function register(Request $request){
        $user=new User();
        $user->user_name=$request->user_name;
        $user->user_pass=bcrypt($request->user_pass);
        $user->user_tlfn=$request->user_tlfn;
        $user->user_email=$request->user_email;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => "register berhasil"
        ]);
    }
}
