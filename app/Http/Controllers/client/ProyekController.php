<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->modul = 'proyek';
    }

    public function index()
    {
        $title = "";
        $modul = $this->modul;
        $data = Proyek::where('user_id', Auth::user()->id)->get();
        return view('project.index', compact('title', 'data', 'modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "";
        return view('project.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $messages = [
            'required' => 'Field wajib diisi',
            'max' => 'Field tidak boleh kurang dari 8 karakter',
            'string' => 'Field hanya bisa diisi oleh text',
            'pdf' => 'Hanya mendukung format file pdf'
        ];

        // $this->validate($request, [
        //     'nama_proyek' => ['required', 'max:8', 'string'],
        //     'lokasi' => ['required', 'max:8', 'string'],
        //     'waktu_mulai' => ['required', 'date'],
        //     'waktu_selesai' => ['required', 'date'],
        //     'file' => ['required']
        // ], $messages);

        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/files');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $post = new Proyek;
                $post->nama_proyek = $request->nama_proyek;
                $post->lokasi = $request->lokasi;
                $post->waktu_mulai = $request->waktu_mulai;
                $post->waktu_selesai = $request->waktu_selesai;
                $post->status = 'diajukan';
                $post->file = $rename;
                $post->user_id  = Auth::user()->id;
                $post->jenis = $request->jenis;
                $post->save();

                return redirect('client/proyek');
            }
            return redirect('client/proyek');
        }
        return redirect('client/proyek');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "";
        $data = Proyek::find($id);
        return view('project.show', compact('data', 'title'));
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
        $post = Proyek::find($id);
        $uploadPath = public_path('uploads/files/');
        File::delete($uploadPath, $post->file);
        $post->delete();
        return redirect()->back();
    }
}
