<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriModel;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriModel::all();
        return view('kategori.index',compact('data'));
    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $data = KategoriModel::where('kategori','LIKE','%'.$cari.'%')->get();
         return view('kategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required',
        ]);

        $Kategori = new KategoriModel;
        $Kategori->kategori = $request->kategori;
        $Kategori->save();

        Session::flash('success','Data Berhasil Ditambahkan');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KategoriModel::find($id);
        return view('kategori.edit',compact('data'));
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
            'kategori' => 'required',
        ]);

        $Kategori = KategoriModel::find($id);
        $Kategori->kategori = $request->kategori;
        $Kategori->save();

        Session::flash('success','Data Berhasil Diubah');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Kategori = KategoriModel::find($id);
        $Kategori->delete();

        Session::flash('success','Data Berhasil Dihapus');
        return redirect()->route('kategori.index');
    }
}
