<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Session;

class ManageShowController extends Controller
{
	public function index(Request $req){
		if($req->session()->has('user')=="admin"){
			$dtpost = DB::table('tbl_show')->get();
			return view('manageShow', compact('dtpost'));
		}
		else{
			return redirect()->action('LoginController@index');
		}
	}
	
	public function view(){
		$dtpost = DB::table('tbl_show')->get();
		return view('posting', compact('dtpost'));
	}

	public function home(){
		$dtpost = DB::table('tbl_show')->get();
		return view("home", compact('dtpost'));
	}


	public function create(){
		return view('createShow');
	}
	
	public function process_create(Request $req){
		try{
			$newname= $req->judul."-".uniqid().".png";
			$req->file('poster')->move('photo',$newname);
			DB::table('tbl_show')->insert([
				'judul'     =>$req->judul,
				'tanggal'   =>$req->tanggal,
				'waktu'     =>$req->waktu,
				'lokasi'    =>$req->lokasi,
				'poster'	=>$newname,
				'harga'     =>$req->harga,
				'stok'      =>$req->stok,
				'keterangan'=>$req->keterangan]);
			Session::flash('success', 'Berhasil Create Show');
			return redirect()->action('ManageShowController@index');
		}
		catch(QueryException $ex){
			Session::flash('failed', 'Gagal Create Show'. $ex->getMessage());
			return redirect()->back()->withInput();
		}
	}
	
	public function update(Request $req, $id){
		$dtpost = DB::table('tbl_show')->where('id', $id)->first();
		return view('updatePosting', compact('dtpost'));
	}
	
	public function process_update(Request $req, $id){
		try{
			if(empty($req->file('poster'))) {
				DB::table('tbl_show')
					->where('id', $req->id)
					->update([
						'judul'     =>$req->judul,
						'tanggal'   =>$req->tanggal,
						'waktu'     =>$req->waktu,
						'lokasi'    =>$req->lokasi,
						'poster'	=>$newname,
						'harga'     =>$req->harga,
						'stok'      =>$req->stok,
						'keterangan'=>$req->keterangan]);
			}
			else{
				$newname= $req->judul."-".uniqid().".png";
				$req->file('poster')->move('photo',$newname);
				
				DB::table('tbl_show')
					->where('id', $req->id)
					->update([
						'judul'     =>$req->judul,
						'tanggal'   =>$req->tanggal,
						'waktu'     =>$req->waktu,
						'lokasi'    =>$req->lokasi,
						'poster'	=>$newname,
						'harga'     =>$req->harga,
						'stok'      =>$req->stok,
						'keterangan'=>$req->keterangan]);
							  
				unlink(public_path("photo/".$req->oldposter));
			}
			Session::flash('success', 'Berhasil Update Show');
		}
		catch(QueryException $ex){
			Session::flash('failed', 'Gagal Update Show'. $ex->getMessage());
		}
		return redirect()->action('ManageShowController@index');
	}
	
	public function delete(Request $req, $id, $foto){
		try{
			DB::table('tbl_show')->where('id', $id)
									->delete();
			unlink(public_path("photo/".$foto));
			Session::flash('success', 'Berhasil Hapus Posting');
		}
		catch(QueryException $ex){
			Session::flash('failed', 'Gagal Hapus Posting');
		}
		return redirect()->action('ManageShowController@index');
	}
}