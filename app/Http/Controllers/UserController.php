<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function postLogin(Request $request)
  {
   // dd($request->all());
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
  public function seeAdminLogin(Request $request)
  {return view('auth/adminlogin');

  }
  public function postAdminLogin(Request $request)
  {
   // dd($request->all());
    $email=$request->email;
    $password=$request->password;
    $admin=1;
    if (Auth::attempt(array('email' => $email, 'password' => $password,'admin'=>$admin)))
    {
      
      return redirect('admin/dashboard');
    }
    
      else{

    
    return redirect('index')
        ->with('error','You an not an administrator of this site please continue shopping');
   
  }}

  public function getLogout()
  {
    Auth::logout();
    
    return redirect('index');
  }
}

