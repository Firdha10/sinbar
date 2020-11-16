<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasukModel;
use App\BarangModel;
use App\SuplierModel;
use Session;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasukModel::all();
        return view('barangmasuk.index',compact('data'));
    }

     public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = MasukModel::where('tgl_masuk','LIKE','%'.$cari.'%')->get();
        return view('barangmasuk.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = BarangModel::all();
        $suplier = SuplierModel::all();
        return view('barangmasuk.create',compact('barang','suplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = MasukModel::where('barang_id',$request->input('barang'))->count();

        if($count>0){
            Session::flash('danger', 'Barang Yang Sama Telah Ada!');
            return redirect()->to('barangmasuk');
        }
    
        $MasukModel = new MasukModel;
        $MasukModel->suplier_id = $request->suplier;
        $MasukModel->barang_id = $request->barang;
        $MasukModel->tgl_masuk = $request->tgl_masuk;
        $MasukModel->jumlah_masuk = $request->jumlah;
        $MasukModel->save();

        $MasukModel->Barang->where('id', $MasukModel->barang_id)
                        ->update([
                            'stok_barang' => ($MasukModel->Barang->stok_barang + $request->jumlah),
                            ]);

        Session::flash('success','Data Berhasil Ditambahkan');
        return redirect()->route('barangmasuk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MasukModel::find($id);
        return view('barangmasuk.show',compact('data'));
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
        $MasukModel = MasukModel::find($id);
        $MasukModel->delete();

        $MasukModel->Barang->where('id', $MasukModel->barang_id)
                        ->update([
                            'stok_barang' => ($MasukModel->Barang->stok_barang - $MasukModel->jumlah_masuk),
                            ]);
        Session::flash('success','Data Berhasil Dihapus');
        return redirect()->route('barangmasuk.index');
    }
}
