<?php

namespace App\Http\Controllers;

use App\BarangModel;
use App\KategoriModel;
use Illuminate\Http\Request;
use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = BarangModel::all();
        return view('barang.index',compact('barang'));
    }


    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $barang = BarangModel::where('nama_barang','LIKE','%'.$cari.'%')->get();
        return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriModel::all();
        return view('barang.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'numeric|required',
            'harga' => 'numeric|required',
            'exp' => 'required',
        ]);

        $file = $request->file('foto');
        $org = $file->getClientOriginalName();
        $path = 'image';
        $file->move($path,$org);

        $BarangModel = new BarangModel;
        $BarangModel->nama_barang = $request->nama;
        $BarangModel->kategori_id = $request->kategori;
        $BarangModel->stok_barang = $request->stok;
        $BarangModel->harga_barang = $request->harga;
        $BarangModel->tgl_masuk_barang = date('Y-m-d');
        $BarangModel->expired_barang = $request->exp;
        $BarangModel->foto_barang = $org;
        $BarangModel->save();

        Session::flash('success','Data Success Submit');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BarangModel::find($id);
        return view('barang.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BarangModel::find($id);
        $kategori = KategoriModel::all();
        return view('barang.edit',compact('data','kategori'));
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
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'numeric|required',
            'harga' => 'numeric|required',
            'exp' => 'required',
        ]);

        $foto = $request->file('foto');
        if ($foto == "") {

            $BarangModel = BarangModel::find($id);
            $BarangModel->nama_barang = $request->nama;
            $BarangModel->kategori_barang = $request->kategori;
            $BarangModel->stok_barang = $request->stok;
            $BarangModel->harga_barang = $request->harga; 
            $BarangModel->expired_barang = $request->exp;
            $BarangModel->save();

            Session::flash('success','Data Success Update');
            return redirect()->route('barang.index');

        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'image';
            $file->move($path,$org);

            $BarangModel = BarangModel::find($id);
            $BarangModel->nama_barang = $request->nama;
            $BarangModel->kategori_barang = $request->kategori;
            $BarangModel->stok_barang = $request->stok;
            $BarangModel->harga_barang = $request->harga;
            $BarangModel->expired_barang = $request->exp;
            $BarangModel->foto_barang = $org;
            $BarangModel->save();

            Session::flash('success','Data Success Update');
            return redirect()->route('barang.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BarangModel = BarangModel::find($id);
        $BarangModel->delete();
        Session::flash('success','Data Success Delete');
        return redirect()->route('barang.index');
    }


}
