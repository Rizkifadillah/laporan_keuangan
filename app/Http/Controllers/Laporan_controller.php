<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Laporan_controller extends Controller
{
    public function index(){
        // $data = \DB::table('pemasukan as a')->join('sumber as b','a.sumber_pemasukan','=','b.id')->get();
        return view('laporan.laporan_index'
        // ,compact('data')
    );
    }

    public function cari(Request $request){
        $this->validate($request,[
            'dari'=>'required',
            'sampai'=>'required'
        ]);

        $dari = date('Y-m-d',strtotime($request->dari));
        $sampai =date('Y-m-d',strtotime($request->sampai));

        $pemasukan =\DB::table('pemasukan')->whereBetween('tanggal',[$dari,$sampai])->get();
        $pengeluaran =\DB::table('pengeluaran')->whereBetween('tanggal',[$dari,$sampai])->get();

        // dd($pemasukan, $pengeluaran);
        return view('laporan.laporan_index',compact('pemasukan','pengeluaran'));

    }
}
