<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeluarModel;
use App\BarangModel;
use Session;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KeluarModel::all();
        return view('barangkeluar.index',compact('data'));
    }

     public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = KeluarModel::where('tgl_keluar','LIKE','%'.$cari.'%')->get();
        return view('barangkeluar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = BarangModel::all();
        return view('barangkeluar.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = KeluarModel::where('barang_id',$request->input('barang'))->count();

        if($count>0){
            Session::flash('danger', 'Barang Yang Sama Telah Ada!');
            return redirect()->to('barangkeluar');
        }

        $KeluarModel = new KeluarModel;
        $KeluarModel->barang_id = $request->barang;
        $KeluarModel->tgl_keluar = date('Y-m-d');
        $KeluarModel->jumlah_keluar = $request->jumlah;
        $KeluarModel->save();

        $KeluarModel->Barang->where('id', $KeluarModel->barang_id)
                        ->update([
                            'stok_barang' => ($KeluarModel->Barang->stok_barang - $request->jumlah),
                            ]);

        Session::flash('success','Data Berhasil Ditambahkan');
        return redirect()->route('barangkeluar.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KeluarModel::find($id);
        return view('barangkeluar.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KeluarModel =  KeluarModel::find($id);
        $KeluarModel->delete();

        $KeluarModel->Barang->where('id', $KeluarModel->barang_id)
                        ->update([
                            'stok_barang' => ($KeluarModel->Barang->stok_barang + $KeluarModel->jumlah_keluar),
                            ]);

        Session::flash('success','Data Berhasil Dihapus');
        return redirect()->route('barangkeluar.index');
    }
}
