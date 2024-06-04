<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Pembelian;
use Illuminate\Support\Str;
use Session;

class PembelianController extends Controller
{
    public function index()
    {
        $dtbeli = Pembelian::with('show')->get();
        return view('penjualan', compact('dtbeli'));
    }


    public function view()
    {
        $dtbeli = DB::table('tbl_pembelian')->get();
        return view('beli', compact('dtbeli'));
    }

    public function mytiket()
    {
        $dtbeli = Pembelian::with('show')->get();
        return view('mytiket', compact('dtbeli'));
    }


    public function showBeli($id, $judul, $poster, $harga)
    {
        return view('beli', compact('id', 'judul', 'poster', 'harga'));
    }

    public function process_beli(Request $request){
        try {
            $harga = $request->harga;
            $jumlah = $request->jumlah;
            $totalHarga = $harga * $jumlah;

            $namaFile = Str::afterLast($request->poster, '/');

            DB::table('tbl_pembelian')->insert([
                'nik'       => $request->nik,
                'nama'      => $request->nama,
                'no_hp'     => $request->no_hp,
                'jumlah'    => $request->jumlah,
                'total_harga' => $totalHarga,
                'poster'    => $namaFile,
                'judul'       => $request->judul,
            ]);

            

            DB::table('tbl_show')
                ->where('id', $request->id)
                ->decrement('stok', $jumlah);

            Session::flash('success', 'Pembelian Berhasil');
            return redirect()->action('PembelianController@mytiket');
        } catch (QueryException $ex) {
            Session::flash('failed', 'Pembelian Gagal' . $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }



    public function hapusPembelian($nik)
    {
        try {
            DB::table('tbl_pembelian')->where('nik', $nik)->delete();
            Session::flash('success', 'Pembelian berhasil dihapus');
            return redirect()->back();
        } catch (QueryException $ex) {
            Session::flash('failed', 'Penghapusan pembelian gagal' . $ex->getMessage());
            return redirect()->back();
        }
    }

    public function editPembelian($nik)
    {
        $data = DB::table('tbl_pembelian')->where('nik', $nik)->first();
        return view('edit_pembelian', compact('data'));
    }

    public function updatePembelian(Request $request, $nik)
    {
        try {
            DB::table('tbl_pembelian')->where('nik', $nik)->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
            ]);

            Session::flash('success', 'Pembelian berhasil diupdate');
            return redirect()->action('PembelianController@mytiket');
        } catch (QueryException $ex) {
            Session::flash('failed', 'Update pembelian gagal' . $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
