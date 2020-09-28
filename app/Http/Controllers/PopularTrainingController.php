<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\Popular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PopularTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popular = Popular::all();
        return view('admin.populars.popular')->with('popular', $popular);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelatihan = Pelatihan::all();
        return view('admin.populars.create')->with('pelatihan', $pelatihan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'urutan' => 'required|unique:populars',
            'pelatihan_id' => 'required|exists:pelatihans,id'
        ]);
        $popular = new Popular();
        $popular->urutan = $request->input('urutan');
        $popular->save();
        $pelatihan = Pelatihan::find($request->pelatihan_id);
        $popular->pelatihans()->attach($pelatihan);

        Session::put('message', 'Data Berhasil Ditambah');
        return redirect('admin/pelatihan/popular');
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
        $populer = Popular::find($id);
        return view('admin.populars.edit')->with('populer', $populer);
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
        $popular = Popular::find($id);
        $popular->urutan = $request->input('urutan');
        $popular->update();
        Session::put('success', 'Popular Berhasil Diperbaharui');
        return redirect('admin/pelatihan/popular');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Popular::find($id);
        $delete->delete();
        Session::put('success', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
