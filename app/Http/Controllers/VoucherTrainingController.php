<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\If_;

class VoucherTrainingController extends Controller
{
    public function usedVoucher()
    {
        $voucher = Voucher::paginate();
        return view('admin.vouchers.used-voucher')->with('voucher', $voucher);
    }
    public function create($id)
    {
        $voucher = Pelatihan::find($id);
        return view('admin.vouchers.create')->with('voucher', $voucher);
    }
    public function modalForm($id)
    {
        $modal = Pelatihan::find($id);
        return view('admin.trainings.modal')->with('modal', $modal);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = Pelatihan::all();
        return view('admin.trainings.voucher')->with('pelatihan', $pelatihan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addVoucher(Request $request, $id)
    {
        $voucher = Pelatihan::find($id);
        if ($voucher->voucher == 0) {
            $voucher->voucher = $request->input('voucher');
            $voucher->update();

            for ($i = 0; $i < $voucher->voucher; $i++) {
                $randomKode = Str::random(8);
                $kode = Voucher::create(
                    [
                        'kode' => $randomKode,
                        'pelatihan_id' => $request->pelatihan_id
                    ]
                );
                $voucher->vouchers()->save($kode);
            }
        } else {
            $add = Pelatihan::where('voucher', $voucher->voucher)->get();
            $add->voucher = $request->input('voucher');
            $result = $add->voucher + $voucher->voucher;

            for ($i = 0; $i < $add->voucher; $i++) {
                $randomKode = Str::random(8);
                $kode = Voucher::create(
                    [
                        'kode' => $randomKode,
                        'pelatihan_id' => $request->pelatihan_id
                    ]
                );
                $fix = Pelatihan::find($id);
                $fix->vouchers()->save($kode);
            }
            $save = Pelatihan::find($id);
            $save->voucher = $result;
            $save->save();
            Session::put('message', 'Voucher Berhasil Ditambah');
            return redirect('/admin/pelatihan/voucher/create');    
        }

        Session::put('message', 'Voucher Berhasil Ditambah');
        return redirect('/admin/pelatihan/voucher/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
