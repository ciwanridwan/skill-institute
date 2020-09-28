<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\Pembayaran;
use App\Peserta;
use App\Voucher;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function paymentWebinar($id)
    {
        $toForm = Webinar::find($id);
        return view('webinars.create')->with('toForm', $toForm);
    }

    public function storePaymentWebinar(Request $request, $id)
    {
        $this->validate($request,
        [
            'nama' => 'required|string|exists:pesertas,nama_lengkap',
            'email' => 'required|string|exists:pesertas,email',
            'nomor_hp' => 'required|exists:pesertas,nomor_hp',
            'peserta_id' => 'required|exists:pesertas,id',
            'pelatihan_id' => 'required|exists:pelatihans,id',
        ]);

        $payment = new Pembayaran();
        $payment->nama = $request->nama;
        $payment->email = $request->email;
        $payment->nomor_hp = $request->nomor_hp;
        $payment->peserta_id = $request->peserta_id;
        $payment->pelatihan_id = $request->pelatihan_id;
        $payment->status = 1;
        // dd($payment->pelatihan_id);
        $payment->save();
        $pelatihan = Pelatihan::find($request->pelatihan_id);
        $payment->pelatihans()->attach($pelatihan);

        Session::put('message', 
        'Selamat, Pembelian Pelatihan Berhasil, Silahkan Lanjut Buka Dashboard Anda Untuk Melanjutkan Pelatihan');
        return redirect()->back();   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $this->validate($request,
        [
            'nama' => 'required|string|exists:pesertas,nama_lengkap',
            'email' => 'required|string|exists:pesertas,email',
            'nomor_hp' => 'required|exists:pesertas,nomor_hp',
            'peserta_id' => 'required|exists:pesertas,id',
            'pelatihan_id' => 'required|exists:pelatihans,id',
            'voucher_id' => 'required|exists:vouchers,id',
        ]);
        $voucher = Voucher::all()->random(1);
        foreach ($voucher as $key) {
            // dd($key->id);
        }
        // ($key->id);
        $payment = new Pembayaran();
        $payment->nama = $request->nama;
        $payment->email = $request->email;
        $payment->nomor_hp = $request->nomor_hp;
        $payment->peserta_id = $request->peserta_id;
        $payment->pelatihan_id = $request->pelatihan_id;
        $payment->voucher_id = $key->id;
        $payment->status = 1;
        // dd($payment->pelatihan_id);
        $payment->save();
        $pelatihan = Pelatihan::find($request->pelatihan_id);
        $payment->pelatihans()->attach($pelatihan);
        $payment->vouchers()->attach($key->id);

        Session::put('message', 
        'Selamat, Pembelian Pelatihan Berhasil, Silahkan Lanjut Buka Dashboard Anda Untuk Melanjutkan Pelatihan');
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
