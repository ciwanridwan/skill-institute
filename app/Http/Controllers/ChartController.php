<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChartController extends Controller
{
    public function chartPeserta()
    {
        $result = Peserta::all();
        return response()->json($result);
    }
    public function displayChart()
    {
        $result = Chart::where('name', '=', 'Laptop')->orderBy('year', 'ASC')->get();
        return response()->json($result);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('charts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('charts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chart = new Chart([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'year' => $request->get('year'),
        ]);
        $chart->save();

        Session::put('success', 'Data berhasil ditambahkan');
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
