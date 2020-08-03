<?php

namespace App\Http\Controllers;

use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebinarController extends Controller
{
    public function table()
    {
        return view('admin.webinars.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('webinar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.webinars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customeErrorMessage = [
            'required' => ':attribute harus diisi tidak boleh kosong'
        ];
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'harga' => 'required',
            'tipe' => 'required|string',
            'trainer' => 'required|string',
            'deskripsi' => 'required|string',
            'alat_webinar' => 'required|string',
            'publish' => 'required|string',
            'jadwal' => 'required|date',
            'link' => 'required|string',
            'kuota_pendaftaran' => 'required|string',
            'gambar' => 'required|nullable|max:1999'
        ], $customeErrorMessage);

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambar', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $webinar = new Webinar();
        $webinar->judul = $request->input('judul');
        $webinar->harga = $request->input('harga');
        $webinar->tipe = $request->input('tipe');
        $webinar->trainer = $request->input('trainer');
        $webinar->deskripsi = $request->input('deskripsi');
        $webinar->alat_webinar = $request->input('alat_webinar');
        $webinar->publish = $request->input('publish');
        $webinar->jadwal = $request->input('jadwal');
        $webinar->link = $request->input('link');
        $webinar->kuota_pendaftaran = $request->input('kuota_pendaftaran');
        $webinar->gambar = $fileNameToStore;
        $webinar->save();


        Session::put('success', 'Webinar Berhasil Ditambahkan');
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
        //
    }
}
