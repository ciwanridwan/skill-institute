<?php

namespace App\Http\Controllers;

use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesertaController extends Controller
{
    public function dashboard()
    {
        return view('peserta.dashboard');
    }

    public function storeRegister(Request $request)
    {
        if (
            !$request->nama_lengkap || !$request->email || !$request->password || !$request->nomor_hp
        ) {
            Session::put('error', 'Semua Field Harus Diisi');
        }

        $customErrorMessage = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
            'digits_between' => 'Nomor handphone maksimal 13 number',
            'min' => 'password minimal 6 karakter',
            'confirmed' => 'Password tidak sesuai dengan konfirmasi password, cek kembali password yang diinput'
        ];
        $this->validate(
            $request,
            [
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|email|unique:pesertas',
                'nomor_hp' => 'required|digits_between:1,13',
                'password' => 'required|string|min:6|confirmed',
            ], 
            $customErrorMessage,
        );

        if (!auth()->guard('peserta')->check()) {
            $peserta = Peserta::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nomor_hp' => $request->nomor_hp,
                'password' => $request->password,
            ]);
        }
        
        Session::put('message', 'Sukses Registrasi Akun');
        // dd($peserta);
        return redirect()->back();
    }
    public function register()
    {
        return view('peserta.register');
    }

    public function login()
    {
        return view('peserta.login');
    }
    public function storeLogin(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'email' => 'required|email|exists:pesertas,email',
            'password' => 'required|string'
        ]);

        //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
        //KARENA JUGA DISERTAKAN TOKEN
        $auth = $request->only('email', 'password');

        //CHECK UNTUK PROSES OTENTIKASI
        //DARI GUARD PESERTA, KITA ATTEMPT PROSESNYA DARI DATA $AUTH
        if (auth()->guard('peserta')->attempt($auth)) {
            //JIKA BERHASIL MAKA AKAN DIREDIRECT KE DASHBOARD
            return redirect()->intended(route('dashboard-peserta'));
        }
        //JIKA GAGAL MAKA REDIRECT KEMBALI BERSERTA NOTIFIKASI
        return redirect()->back()->with(['error' => 'Email / Password Salah, Atau Kurang Cocok']);
    }

    public function logoutUser()
    {

    }

    public function subscribed()
    {
        return view('admin.peserta.subscribed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view('admin.peserta.index')->with('peserta', $peserta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
