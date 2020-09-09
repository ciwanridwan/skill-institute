<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\LevelTraining;
use App\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function historyTraining()
    {
        return view('peserta.trainings.history');
    }

    public function pesertaTraining()
    {
        return view('peserta.trainings.index');
    }

    public function trainingOnline()
    {
        $online = Pelatihan::where('tipe', '=', 'Online')->where('publish', '=', 'Ya')->get();
        return view('trainings.online')->with('online', $online);
    }

    public function trainingOffline()
    {
        $offline = Pelatihan::where('tipe', '=', 'Offline')->where('publish', '=', 'Ya')->get();
        return view('trainings.offline')->with('offline', $offline);
    }

    public function details($id)
    {
        $details = Pelatihan::find($id);
        return view('trainings.details')->with('details', $details);
    }

    public function table()
    {
        $training = Pelatihan::all();
        return view('admin.trainings.index')->with('training', $training);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = Pelatihan::all();
        return view('trainings.index')->with('training', $training);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $level = LevelTraining::all();
        return view('admin.trainings.create', compact('kategori', 'level'));
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
            'nama' => 'required|string|max:255',
            'harga' => 'required',
            'kode_unik_voucher' => 'required',
            'tipe' => 'required|string|max:255',
            'trainer' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'alat_training' => 'required|string|max:255',
            'publish' => 'required|string|max:255',
            'kategori' => 'required',
            'level' => 'required',
            'pengalaman_kerja_peserta' => 'required|string|max:255',
            'kemampuan_dasar_peserta' => 'required|string|max:255',
            'kemampuan_teknis_peserta' => 'required|string|max:255',
            'bahan_materi' => 'required|string|max:255',
            'gambar' => 'required|nullable|max:1999'
        ], $customeErrorMessage);

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambar_pelatihan', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $training = new Pelatihan();
        $training->nama = $request->input('nama');
        $training->harga = $request->input('harga');
        $training->kode_unik_voucher = $request->input('kode_unik_voucher');
        $training->tipe = $request->input('tipe');
        $training->trainer = $request->input('trainer');
        $training->deskripsi = $request->input('deskripsi');
        $training->alat_training = $request->input('alat_training');
        $training->publish = $request->input('publish');
        $training->kategori = $request->input('kategori');
        $training->level = $request->input('level');
        $training->pengalaman_kerja_peserta = $request->input('pengalaman_kerja_peserta');
        $training->kemampuan_dasar_peserta = $request->input('kemampuan_dasar_peserta');
        $training->kemampuan_teknis_peserta = $request->input('kemampuan_teknis_peserta');
        $training->bahan_materi = $request->input('bahan_materi');
        $training->gambar = $fileNameToStore;
        $training->save();

        Session::put('success', 'Pelatihan Berhasil Ditambahkan');
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
        $training = Pelatihan::find($id);
        $kategori = Kategori::all();
        $level = LevelTraining::all();
        return view('admin.trainings.edit', compact('training', 'kategori', 'level'));
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
        $training = Pelatihan::find($id);
        $training->nama = $request->input('nama');
        $training->harga = $request->input('harga');
        $training->kode_unik_voucher = $request->input('kode_unik_voucher');
        $training->tipe = $request->input('tipe');
        $training->trainer = $request->input('trainer');
        $training->deskripsi = $request->input('deskripsi');
        $training->alat_training = $request->input('alat_training');
        $training->publish = $request->input('publish');
        $training->kategori = $request->input('kategori');
        $training->level = $request->input('level');
        $training->pengalaman_kerja_peserta = $request->input('pengalaman_kerja_peserta');
        $training->kemampuan_dasar_peserta = $request->input('kemampuan_dasar_peserta');
        $training->kemampuan_teknis_peserta = $request->input('kemampuan_teknis_peserta');
        $training->bahan_materi = $request->input('bahan_materi');

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/gambar_pelatihan', $fileNameToStore);
            $training->gambar = $fileNameToStore;

            $select_old_gambar_name = DB::table('pelatihans')->where('id', $request->id)->first();

            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/gambar_pelatihan', $select_old_gambar_name->gambar);
            }
        }

        $training->update();
        Session::put('success', 'Pelatihan Berhasil Diperbaharui');
        // return redirect('/admin/pelatihan/table');
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
        $training = Pelatihan::find($id);
        $training->delete();

        Session::put('success', 'Berhasil Dihapus');
        return redirect()->back();
    }
}
