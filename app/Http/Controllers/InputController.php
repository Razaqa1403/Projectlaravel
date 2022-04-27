<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputController extends Controller
{
    function index()
    {
        $karyawans = DB::table('karyawan')
                        //->groupBy('site')
                        ->get();
        $sites = DB::table('mssite')->orderBy('siteID','ASC')->get();
        $namemeets = DB::table('namemeet')->orderBy('nameID','ASC')->get();

        return view('/input', compact('sites', 'karyawans', 'namemeets'));
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('karyawan')
                ->where($select, $value)
                //->groupBy($dependent)
                ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->nick.' - '.$row->nama.'">
                '.$row->nama.'</option>';
        }
        echo $output;
    }
}
