<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
	public function index(){
		return view('login');
	} 
	
    public function process_login(Request $req){
        $user = $req->username;
        $pass = $req->password;

        if ($user === 'admin' && $pass === '123') {
            // Jika username dan password admin, beri akses sebagai admin
            session(['user' => $user, 'name' => 'Admin']);
            return redirect("/");
        } else {
            // Jika bukan admin, lakukan pemeriksaan ke database
            $login = DB::table('tbl_user')
                        ->where('username', $user)
                        ->where('password', md5($pass))
                        ->first();

            if($login){
                session(['user'  => $user, 
                         'name'  => $login->fullname]);
                return redirect("/");
            } else {
                Session::flash('failed', 'Username atau Password Salah');
                return redirect()->action('LoginController@index');			
            }
        }
    }
	
    public function process_logout(Request $req){
        Session::flush();
        if(!($req->session()->has('user'))){
            return redirect()->action('LoginController@index');
        }
    }
}
