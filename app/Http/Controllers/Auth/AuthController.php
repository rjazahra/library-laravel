<?php
namespace App\Repositories;
namespace App\Http\Controllers\Auth;

use App\Verification;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;


class AuthController extends Controller
{
public function register(Request $request)
{
$validateData=$request->validate([
'name'=>'required|max:55',
'email'=>'email|required|unique:users',
'password'=>'required|confirmed'
]);
$validateData['password']=bcrypt($request->password);

$user=User::create($validateData);
$accsessToken=$user->createToken('authToken')->accsessToken;
return response(['user'=>$user,'access_token' => $accsessToken ]);
}


public function login(Request $request)
{
    $loginData=$request->validate([
        'email'=>'email|required',
        'password'=>'required'
        ]);

        if(!auth()->attempt($loginData))
        {
            return response(['message'=>'Invalid credenatails']);
        }
        
            $accsessToken=auth()->user()->createToken('authToken')->accsessToken;
            return response(['user' => auth()->user(),'access_token' => $accsessToken ]);


        

}
}
