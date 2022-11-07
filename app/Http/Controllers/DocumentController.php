<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\JenisProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->modul = 'dokumen';
    }

    public function index()
    {
        $modul = $this->modul;
        $data = Dokumen::all();
        return view('document.index', compact('modul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = $this->modul;
        $data = Proyek::all();
        $jenis = JenisProyek::all();
        return view('document.create', compact('modul', 'data', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Field wajib diisi'
        ];

        $this->validate($request, [
            'proyek_id' => ['required'],
            'jenis_id' => ['required'],
            'jenis_dokumen' => ['required'],
            'file' => ['required']
        ], $messages);

        if ($request->hasFile('file')) {
            // dd($request);
            $uploadPath = public_path('uploads/files');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $post = new Dokumen;
                $post->proyek_id = $request->proyek_id;
                $post->jenis_id = $request->jenis_id;
                $post->jenis_dokumen = $request->jenis_dokumen;
                $post->dokumen = $rename;
                $post->save();
                // dd($post);
                toast('success', 'Berhasil menambahkan data!');
                return redirect(route($this->modul . '.index'));
            }
            toast('error', 'Gagal menambahkan data!');
            return redirect(route($this->modul . '.index'));
        } else {
            dd("gagal");
        }
        toast('error', 'Gagal menambahkan data!');
        return redirect(route($this->modul . '.index'));
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
