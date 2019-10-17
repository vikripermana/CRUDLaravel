<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
    	 $siswa = DB::table('siswa')->get();

    	 return view('siswa', ['siswa' => $siswa]);
    }
    public function tambah(Request $request)
    {
    	DB::table('siswa')->insert([
    		'nis' => $request->nis,
    		'nama' => $request->nama,
    		'kelas' => $request->kelas,
    		'alamat' => $request->alamat
    	]);
    	return redirect('/siswa');
    }
    public function update(Request $request)
    {
    	$siswa = DB::table('siswa')->where('id',$request->id)->update([
    		'nis' => $request->nis,
    		'nama' => $request->nama,
    		'kelas' => $request->kelas,
    		'alamat' => $request->alamat
    	]);
    	return redirect('/siswa');
    }
    public function delete($id)
    {
    	 DB::table('siswa')->where('id',$id)->delete();
    	 return redirect('/siswa');
    }
}
