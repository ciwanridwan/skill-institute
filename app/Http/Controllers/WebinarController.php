<?php

namespace App\Http\Controllers;

use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    public function pesertaWebinar()
    {
        return view('peserta.webinars.index');
    }
    public function details($id)
    {
        $details = Webinar::find($id);
        return view('webinars.details')->with('details', $details);
    }

    public function table()
    {
        $webinar = Webinar::all();
        return view('admin.webinars.index')->with('webinar', $webinar);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar = Webinar::all();
        return view('webinars.index')->with('webinar', $webinar);
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
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
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
        $webinar = Webinar::find($id);
        return view('admin.webinars.edit')->with('webinar', $webinar);
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
        $webinar = Webinar::find($id);
        // dd($webinar);
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

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambar', $fileNameToStore);
            $webinar->gambar = $fileNameToStore;

            $select_old_gambar_name = DB::table('webinars')->where('id', $request->id)->first();

            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/gambar', $select_old_gambar_name->gambar);
            }
        }

        $webinar->update();
        Session::put('success', 'Data Webinar Berhasil Diperbaharui');
        return redirect('/admin/webinar/table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::find($id);
        $webinar->delete();

        Session::put('success', 'Webinar Berhasil Dihapus');
        return redirect()->back();
    }
}
