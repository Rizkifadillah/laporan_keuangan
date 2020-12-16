<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

class Pemasukan_controller extends Controller
{
    public function index(){
        $data = \DB::table('pemasukan as a')->join('sumber as b','a.sumber_pemasukan','=','b.id')->get();
        return view('pemasukan.pemasukan_index',compact('data'));
    }

    public function add(){
        $sumber = \DB::table('sumber')->get();
        return view('pemasukan.pemasukan_add',compact('sumber'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'sumber_pemasukan'=>'required',
            'nominal'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required',

        ]);

        $nama = $request->nama;

        \DB::table('pemasukan')->insert([
            'pemasukan_id'=>\Uuid::generate(4),
            'sumber_pemasukan'=>$request->sumber_pemasukan,
            'nominal'=>$request->nominal,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'keterangan'=>$request->keterangan,
        ]);
        return redirect('pemasukan');
    }

    public function edit($id){
        $sumber = \DB::table('sumber')->get();
        $data = \DB::table('pemasukan')->where('pemasukan_id',$id)->first();
        return view('pemasukan.pemasukan_edit',compact('data','sumber'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'sumber_pemasukan'=>'required',
            'nominal'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required',

        ]);     
        
        \DB::table('pemasukan')->where('pemasukan_id',$id)->update([
            'sumber_pemasukan'=>$request->sumber_pemasukan,
            'nominal'=>$request->nominal,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'keterangan'=>$request->keterangan,
        ]);

        return redirect('pemasukan');
    }

    public function delete($id){
        \DB::table('pemasukan')->where('pemasukan_id',$id)->delete();
        return redirect('pemasukan');
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pemasukan = DB::table('pemasukan as a')->join('sumber as b','a.sumber_pemasukan','=','b.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'a.pemasukan_id',
            'a.sumber_pemasukan',
            'b.nama',
            'a.nominal',
            'a.tanggal',
            'a.keterangan']);
        $datatables = Datatables::of($pemasukan)
        ->addColumn('action', function ($pemasukan) {
            $url_edit = url('pemasukan/'.$pemasukan->pemasukan_id);
            $url_delete = url('pemasukan/'.$pemasukan->pemasukan_id);
            return '<center>
                <a href="'.$url_edit.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
                <a href="'.$url_delete.'" class="btn btn-xs btn-danger btn-hapus"><i class="glyphicon glyphicon-edit"></i> Delete</a>
            </center>';
        })
        ->editColumn('nominal',function($ps){
            $nominal = $ps->nominal;
            $nominal = 'Rp. '.number_format($nominal,0);
            $nominal = str_replace(',','.', $nominal);
            return $nominal;
        })->editColumn('tanggal',function($ps){
            $tanggal = $ps->tanggal;
            $tanggal = date('d M Y',strtotime($tanggal));
            return $tanggal;

        });
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }   
}
