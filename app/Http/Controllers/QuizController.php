<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Pelatihan;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function confirm(Request $request)
    {
        $materi = Materi::all();
        foreach ($materi as $key) {
            $pelatihan = Pelatihan::where('id', $key->pelatihan_id)->get();
            $quiz = Quiz::where('materi_id', $key->id)->get();
            $this->validate($request, [
                'jawaban' => 'required'
            ]);
            foreach ($pelatihan as $pel) {
            
            foreach ($quiz as $qu) {
                if ($request->jawaban == $qu->jawaban) {
                    return redirect()->back();
                } else {
                    Session::put('failed', 'Gagal menyelesaikan quiz, mohon ulangi quiz lagi');
                    return 'gagal';
                }
            }
        }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($judul)
    {
        $materi = Materi::where('judul', $judul)->get();
        foreach ($materi as $key) {
            $soal = Quiz::where('materi_id', $key->id)->get();
            return view('admin.quiz.index')->with('soal', $soal)->with('key', $key);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($judul)
    {
        $materi = Materi::where('judul', $judul)->get();
        foreach ($materi as $p) {
            return view('admin.quiz.create')->with('p', $p);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'soal' => 'required|max:255',
                'pilihan1' => 'required|max:255',
                'pilihan2' => 'required|max:255',
                'pilihan3' => 'required|max:255',
                'pilihan4' => 'required|max:255',
                'jawaban' => 'required|max:255',
                'materi_id' => 'required',
            ]
        );
        $quiz = new Quiz();
        $quiz->soal = $request->input('soal');
        $quiz->pilihan1 = $request->input('pilihan1');
        $quiz->pilihan2 = $request->input('pilihan2');
        $quiz->pilihan3 = $request->input('pilihan3');
        $quiz->pilihan4 = $request->input('pilihan4');
        $quiz->jawaban = $request->input('jawaban');
        $quiz->materi_id = $request->input('materi_id');
        $quiz->save();

        Session::put('success', 'Quiz Berhasil Ditambah');
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
        $edit = Quiz::find($id);
        return view('admin.quiz.edit')->with('edit');
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
