<?php

namespace App\Http\Controllers;

use App\LevelTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LevelTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = LevelTraining::all();
        return view('admin.level.index')->with('level', $level);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessage = [
            'required' => ':attribute tidak boleh kosong'
        ];

        $this->validate($request, [
            'nama' => 'required|string|max:255'
        ], $customMessage);

        $level = new LevelTraining();
        $level->nama = $request->input('nama');
        $level->save();

        Session::put('success', 'Berhasil Menambahkan Level');
        return redirect()->back();
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
        $level = LevelTraining::find($id);
        return view('admin.level.edit')->with('level', $level);
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
        $level = LevelTraining::find($id);
        $level->nama = $request->input('nama');
        $level->update();
        Session::put('success', 'Level Berhasil Diperbaharui');
        return redirect('admin/pelatihan/level-training/table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
