<?php

namespace App\Http\Controllers;

use App\Models\transaksimeeting as ModelsTransaksimeeting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksimeeting extends Controller
{
    // public function index()
    // {
    //     $data = ModelsTransaksimeeting::with('relationToPemimpin', 'relationToNotulen')->get();
    //     return view('minutes', compact('data'));
    // }

    public function index()
    {
        $data = DB::table('transaksimeeting')
                 ->join('karyawan as karyawan1', 'transaksimeeting.pemimpin', 'karyawan1.nick')
                 ->join('karyawan as karyawan2', 'transaksimeeting.notulen', 'karyawan2.nick')
                 ->select('transaksimeeting.*', 'karyawan1.nama as nama_pemimpin', 'karyawan2.nama as nama_notulen')
                 ->get();
        return view('minutes', compact('data'));
    }

    public function store(Request $request)
    {
        try{

            ModelsTransaksimeeting::create([
                "jobsite" => $request->jobsite,
                "nama_meeting" => $request->nama_meeting,
                "jenis_meeting" => $request->jenis_meeting,
                "tempat" => $request->tempat,
                "tanggal" => $request->tanggal,
                "waktu" => $request->waktu,
                "hour" => $request->hour,
                "pemimpin" => $this->removeName($request->pemimpin),
                "notulen" => $this->removeName($request->notulen),
                "snack" => $request->snack,
                "agenda" => $request->agenda,
                "notes" => $request->notes,
                "peserta" => $request->peserta,
            ]);

            //alihkan halaman ke halaman mom
        return redirect("/minutes")->with("success", "Data Berhasil Di Tambah");

        }catch(Exception $e) {
            return response($e->getMessage());
        }

    }

    public function removeName($nama){
        $a = trim($nama);
        $b = strpos($nama, ' -');
        $c = substr($a,0,$b);
        return $c;
    }

    public function create()
    {
        $sites = DB::table('mssite')->orderBy('siteID','ASC')->get();
        $namemeets = DB::table('namemeet')->orderBy('nameID','ASC')->get();
        $karyawans = DB::table('karyawan')->orderBy('nama','ASC')->get();
        return view('/input', compact('sites','namemeets', 'karyawans'));
    }

    public function update(Request $request, $id)
    {
        try{

            ModelsTransaksimeeting::find($id)->update([
                "jobsite" => $request->jobsite,
                "nama_meeting" => $request->nama_meeting,
                "jenis_meeting" => $request->jenis_meeting,
                "tempat" => $request->tempat,
                "tanggal" => $request->tanggal,
                "waktu" => $request->waktu,
                "hour" => $request->hour,
                "pemimpin" => $request->pemimpin,
                "notulen" => $request->notulen,
                "snack" => $request->snack,
                "agenda" => $request->agenda,
                "notes" => $request->notes,
                "peserta" => $request->peserta,
            ]);

        }catch(Exception $e) {
            return response($e->getMessage());
        }
        //alihkan halaman ke halaman mom
        return redirect("/minutes")->with("success", "Data Berhasil Di Ubah");
    }

    public function delete($id)
    {
        // dd($id);
        ModelsTransaksimeeting::find($id)->delete();

        return redirect("/minutes")->with("success", "Data Berhasil Di Hapus");
    }

    public function edit($id)
    {
        $data = ModelsTransaksimeeting::find($id);
        $sites = DB::table('mssite')->orderBy('siteID','ASC')->get();
        $namemeets = DB::table('namemeet')->orderBy('nameID','ASC')->get();
        $karyawans = DB::table('karyawan')->orderBy('nama','ASC')->get();
        return view('/edit', compact('data', 'sites', 'namemeets', 'karyawans'));
    }

    public function info($id)
    {
        $data = ModelsTransaksimeeting::find($id);

        return view('/info', compact('data'));
    }
}
