<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MateriPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function materi($id)
    {
        $materi = Materi::find($id);
        return view('layouts.trainings.navbars.sidebar')->with('materi',$materi);
    }
    
    public function index($id)
    {
        $pelatihan = Pelatihan::find($id);
        $materi = Materi::where('pelatihan_id', $pelatihan->id)->get();
        // dd($materi);
        return view('admin.materis.index', compact('materi', 'pelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pelatihan = Pelatihan::find($id);
        return view('admin.materis.create')->with('pelatihan', $pelatihan);
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
            'judul' => 'required|string',
            'url_video' => 'string',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string',
            'file' => 'mimes:jpg,jpeg,pdf,png,txt,doc,docx',
            'pelatihan_id' => 'required|exists:pelatihans,id',
        ]);
        
        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/files', $fileNameToStore);
        } else {
            $fileNameToStore = 'nofile.txt';
        }

        $materi = new Materi();
        $materi->judul = $request->input('judul');
        $materi->url_video = $request->input('url_video');
        $materi->deskripsi = $request->input('deskripsi');
        $materi->durasi = $request->input('durasi');
        $materi->file = $fileNameToStore;
        $materi->pelatihan_id = $request->pelatihan_id;
        $materi->save();
        // dd($materi->file);

        Session::put('success', 'Materi Berhasil Ditambah');
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
        $materi = Materi::find($id);
        return view('admin.materis.edit')->with('materi', $materi);
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
        $this->validate($request, 
        [
            'judul' => 'string|max:255',
            'url_video' => 'string',
            'deskripsi' => 'string|max:255',
            'durasi' => 'string|max:255',
            'file' => 'mimes:jpg,jpeg,pdf,png,txt,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/files', $fileNameToStore);
        } else {
            $fileNameToStore = 'nofile.txt';
        }

        $materi = Materi::find($id);
        $materi->judul = $request->input('judul');
        $materi->url_video = $request->input('url_video');
        $materi->deskripsi = $request->input('deskripsi');
        $materi->durasi = $request->input('durasi');
        $materi->file = $fileNameToStore;
        $materi->update();

        Session::put('success', 'Materi Berhasil Diperbaharui');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        
        Session::put('message', 'Materi Berhasil Dihapus');
        return redirect()->back();
    }
}
