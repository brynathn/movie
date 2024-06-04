<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Session;

class RegisterController extends Controller
{
	public function index(){
		return view('register');
	}
	
	public function process_register(Request $req){
		try{				
			DB::table('tbl_user')->insert([
				'username'	=>$req->username,
				'email'		=>$req->email,
				'fullname'	=>$req->nama,
				'password'	=>md5($req->password),
			]);
			Session::flash('success', 'Berhasil Register');
			return redirect()->action('LoginController@index');
		}
		catch(QueryException $ex){
			Session::flash('failed', $req->username.' already');
			return redirect()->back()->withInput();
		}
	}
}