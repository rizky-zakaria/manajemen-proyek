<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Proyek;
use App\Models\User;
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
        $this->modul = 'proyek';
    }

    public function index()
    {
        $data = Proyek::all();
        $modul = $this->modul;
        return view('project.index', compact('data', 'modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = $this->modul;
        $user = User::where('role', 'petugas')->get();
        return view('project.create', compact('modul', 'user'));
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
            'required' => 'Field wajib diisi',
            'max' => 'Field tidak boleh kurang dari 8 karakter',
            'string' => 'Field hanya bisa diisi oleh text',
            'pdf' => 'Hanya mendukung format file pdf',
            'integer' => 'Harus berisi data angka'
        ];

        $this->validate($request, [
            'nama_proyek' => ['required', 'min:8', 'string'],
            'lokasi' => ['required', 'min:8', 'string'],
            'waktu_mulai' => ['required', 'date'],
            'waktu_selesai' => ['required', 'date'],
            'petugas' => ['required'],
            'anggaran' => ['integer', 'required']
            // 'file' => ['required']
        ], $messages);

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
                $post->status = 'proses';
                $post->file = $rename;
                $post->user_id  = $request->petugas;
                $post->anggaran = $request->anggaran;
                $post->save();
                toast('success', 'Berhasil menambahkan data!');
                return redirect('data-master/proyek');
            }
            toast('error', 'Gagal menambahkan data!');
            return redirect('data-master/proyek');
        }
        toast('error', 'Gagal menambahkan data!');
        return redirect('data-master/proyek');
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
        $proyek = Proyek::find($id);
        $progres = Progres::where('proyek_id', $id)->first();
        if (isset($progres->id)) {
            $progres->delete();
        }
        $proyek->delete();
        if ($proyek) {
            toast('Berhasil menghapus data!', 'success');
            return redirect(route($this->modul . '.index'));
        } else {
            toast('Gagal menghapus data!', 'error');
            return redirect(route($this->modul . '.index'));
        }
    }
}
