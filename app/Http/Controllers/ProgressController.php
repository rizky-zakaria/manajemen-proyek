<?php

namespace App\Http\Controllers;

use App\Models\HistoryProgres;
use App\Models\Progres;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = 'progress';
    }

    public function index()
    {
        $modul = $this->modul;
        if (Auth::user()->role === "petugas") {
            $data = Proyek::where('user_id', Auth::user()->id)
                ->join('progres', 'progres.proyek_id', '=', 'proyeks.id')->get();
        } else {
            $data = Proyek::join('progres', 'progres.proyek_id', '=', 'proyeks.id')->get();
        }
        return view('progres.index', compact('modul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = $this->modul;
        $progres = Progres::all();
        // $data = Proyek::where('user_id', Auth::user()->id)->whereNotIn('proyek_id', $progres)->get();
        $data = Proyek::doesntHave('progres')->get();
        return view('progres.create', compact('modul', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Progres;
        $post->proyek_id = $request->proyek_id;
        $post->progres = "Belum ada";
        $post->persentase = 0;
        $post->save();

        if ($post) {
            toast("Berhasil menambahkan data!", 'success');
            return redirect(route($this->modul . '.index'));
        } else {
            toast('Gagal menambahkan data', 'error');
            return redirect(route($this->modul . '.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Progres::find($id);
        $history = HistoryProgres::where('proyek_id', $data->proyek_id)->get();
        $modul = $this->modul;
        return view('progres.show', compact('data', 'modul', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Progres::find($id);
        // dd($data->proyek->user_id);
        if ($data->proyek->user_id === Auth::user()->id) {
            $modul = $this->modul;
            return view('progres.edit', compact('data', 'modul'));
        } else {
            toast('Anda bukan orang yang ditugaskan', 'wrong');
            return redirect(route('progres.index'));
        }
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
        if ($request->hasFile('file')) {

            $post = Progres::find($id);
            if ($request->persentase <= $post->persentase) {
                toast('Nilai persentase tidak boleh kurang atau sama dengan sudah ada!', 'error');
                return redirect(route($this->modul . '.index'));
            }
            $post->persentase = $request->persentase;
            $post->progres = 'proses';
            $post->update();

            $uploadPath = public_path('uploads/files');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $history = new HistoryProgres;
                $history->proyek_id = $post->proyek_id;
                $history->user_id = Auth::user()->id;
                $history->bukti = $rename;
                $history->keterangan = $request->keterangan;
                $history->save();
                // dd($post);
                toast('Berhasil menambahkan data!', 'success');
                return redirect(route($this->modul . '.index'));
            }
            toast('Gagal menambahkan data!', 'error');
            return redirect(route($this->modul . '.index'));
        } else {
            toast('Gagal menambahkan data!', 'error');
            return redirect(route($this->modul . '.index'));
        }
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

    public function form_email($id)
    {
        $modul = $this->modul;
        $data = Proyek::where('id', $id)->first();
        return view('progres.form_email', compact('data', 'modul'));
    }
}
