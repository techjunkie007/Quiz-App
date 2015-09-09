<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //Login the User
    public function login()
    {
        //Input Creds
        $credentials= array('name'=> \Input::get('username'), 'password'=> \Input::get('password'));
        
        //Attempt Login
        if (\Auth::attempt($credentials)) 
        {
            //Success
            return \Redirect::intended('dashboard');
        }
        else
        {
            //Fail with Message
            return \Redirect::to('login')->withMessage('Invalid Credentials');
        }
    } 

    //Logout the User
    public function logout()
    {
        //Logout via Auth
        \Auth::logout();
    }   
}
