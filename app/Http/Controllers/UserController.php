<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function postLogin(Request $request)
  {
    $email=$request->email;
    $password=$request->password;

    if (Auth::attempt(array('email' => $email, 'password' => $password)))
    {
        
    return redirect('index');

    }else{

    
    return redirect('index')
        ->with('error','Please check your password & email');
    }
  }

  public function getLogout()
  {
    Auth::logout();
    
    return redirect('index');
  }
}

