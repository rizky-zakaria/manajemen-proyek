<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PembangunanJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = 'pembangunan-jalan';
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "";
        $modul = $this->modul;
        $data = Proyek::where('jenis', 'Pembangunan Jalan')->get();
        return view('project.index', compact('title', 'data', 'modul'));
    }

    public function accept($id)
    {
        $post = Proyek::find($id);
        $post->status = 'diproses';
        $post->update();
        return redirect('data-master/pembangunan-jalan');
    }

    public function reject($id)
    {
        $post = Proyek::find($id);
        $post->status = 'ditolak';
        $post->update();
        return redirect('data-master/pembangunan-jalan');
    }

    public function grapich($id)
    {
        $cek = Progres::where('proyek_id', $id)->get();
        if (!isset($cek[0]['proyek_id'])) {
            toast('Silahkan mengisi parameter penilaian terlebih dahulu!', 'error');
            return redirect('data-master/pembangunan-jalan/form-grapich/' . $id);
        }
        $title = "Pembangunan Jalan";
        $modul = $this->modul;
        return view('progres.index', compact('title', 'cek', 'modul', 'id'));
    }

    public function editProgress($id)
    {
        $title = "";
        $modul = $this->modul;
        $cek = Progres::where('proyek_id', $id)->get();
        return view('progres.edit_progress', compact('title', 'cek', 'modul', 'id'));
    }

    public function updateGrapich(Request $request)
    {
        $messages = [
            'required' => 'Field wajib diisi',
            'integer' => 'Field berisi angka'
        ];
        $id = 1;
        for ($i = 0; $i < count($request->nilai); $i++) {
            $post = Progres::find($request['id'][$i]);
            $post->persentase = $request['nilai'][$i];
            $post->update();
        }

        toast('Berhasil menambahkan data!', 'success');
        return redirect('data-master/pembangunan-jalan');
    }

    public function formGrapich($id)
    {
        $title = "";
        return view('progres.form', compact('title', 'id'));
    }

    public function storeGrapich(Request $request)
    {
        $messages = [
            'required' => 'Field wajib diisi',
            'integer' => 'Field berisi angka'
        ];
        // $this->validate($request, [
        //     'parameter[]' => ['required'],
        //     'nilai[]' => ['required', 'integer']
        // ], $messages);

        for ($i = 0; $i < count($request->nilai); $i++) {
            $post = new Progres;
            $post->proyek_id = $request->id;
            $post->progres = $request['parameter'][$i];
            $post->persentase = $request['nilai'][$i];
            $post->save();
        }

        toast('Berhasil menambahkan data!', 'success');
        return redirect('data-master/pembangunan-jalan');
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
