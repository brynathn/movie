<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Session;

class ProfileController extends Controller
{
	public function index(Request $req, $username){
		if($req->session()->has('user')){
			$dtuser = DB::table('tbl_user')->where('username', $username)->first();
            return view('profile', compact('dtuser'));
		}
		else{
			return redirect()->action('LoginController@index');
		}
	}
	
	public function update(Request $req, $username){
		$dtuser = DB::table('tbl_user')->where('username', $username)->first();
		return view('updateProfile', compact('dtuser'));
	}
	
	public function process_update(Request $req, $username){
		try{
			DB::table('tbl_user')->where('username', $req->username)
							     ->update(['email' 	  => $req->email, 
										   'fullname' => $req->nama]);
			
			Session::flash('success', 'Berhasil update data user');
			return redirect('/profile/'.$req->username);
		}
		catch(QueryException $ex){
			Session::flash('failed', 'Gagal update data user');
			return redirect('/profile/'.$req->username);
		}
	}
	
	public function changepass(Request $req, $username){
		$dtuser = DB::table('tbl_user')->where('username', $username)->first();
		return view('changePassword', compact('dtuser'));
	}
	
	public function process_change(Request $req, $username){
		$pass 		= $req->password;
		$confirm 	= $req->confirm;
		
		if($pass==$confirm){
			try{
				DB::table('tbl_user')->where('username', $username)
								     ->update(['password' => md5($req->password)]);
				Session::flush();
				Session::flash('success', 'Berhasil Change Password');
				return redirect()->action('LoginController@index');
			}
			catch(QueryException $ex){
				Session::flash('failed', 'Gagal Change Password');
				return redirect('/profile/'.$req->username);
			}
		}
		else{
			Session::flash('failed', 'New dan Confirm Password Tidak Sesuai');
			return redirect()->back()->withInput();
		}
	}
	
	public function delete(Request $req, $username){
		try{
			DB::table('tbl_user')->where('username', $username)
								 ->delete();
			Session::flush();
			Session::flash('success', 'Berhasil Hapus Akun');
			return redirect()->action('LoginController@index');
		}
		catch(QueryException $ex){
			Session::flash('failed', 'Gagal Hapus Akun');
			return redirect('/profile/'.$req->username);
		}
	}
}