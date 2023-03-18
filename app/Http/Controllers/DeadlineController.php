<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Denda;
use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->modul = "deadline";
    }

    public function index()
    {
        $modul = $this->modul;
        $data = Denda::all();
        return view('deadline.index', compact('modul', 'data'));
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
        return view('deadline.create', compact('modul', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = Denda::where('proyek_id', $request->proyek_id)->first();

        if (isset($cek->id)) {
            toast('Proyek ini sudah memiliki nominal denda!', 'wrong');
            return redirect(route($this->modul . '.create'));
        } else {
            $post = new Denda;
            $post->proyek_id = $request->proyek_id;
            $post->nominal = $request->nominal;
            $post->save();
            if ($post) {
                toast('Berhasil menambahkan data', 'success');
                return redirect(route($this->modul . '.index'));
            } else {
                toast('Gagal menambahkan data!', 'wrong');
                return redirect(route($this->modul . '.create'));
            }
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
        $data = Proyek::find($id);
        $now = strtotime(date('Y-m-d'));
        $exp = strtotime($data->waktu_selesai);
        $jarak = $now - $exp;
        $hari = $jarak / 60 / 60 / 24;
        $denda = Denda::where('proyek_id', $id)->first();
        $jmlDenda = $denda->nominal * $hari;
        if ($hari <= 0) {
            $status = 'berproses';
        } else {
            $status = 'terlambat';
        }
        $modul = $this->modul;
        return view('deadline.show', compact('data', 'modul', 'hari', 'status', 'jmlDenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul = $this->modul;
        $data = Denda::join('proyeks', 'proyeks.id', '=', 'dendas.id')->first();
        return view('deadline.edit', compact('data', 'modul', 'id'));
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
        $data = Denda::find($id);
        $data->nominal = $request->nominal;
        $data->update();
        if ($data) {
            toast('Berhasil mengubah data!', 'success');
        } else {
            toast('Gagal mengubah data!', 'success');
        }
        return redirect(route('deadline.index'));
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

    public function send_email($id)
    {
        $status = 'lambat';
        $emailBos = User::where('role', 'bos')->first();
        $data = Proyek::find($id);
        $now = strtotime(date('Y-m-d'));
        $exp = strtotime($data->waktu_selesai);
        $jarak = $now - $exp;
        $hari = $jarak / 60 / 60 / 24;
        $send = Mail::to($emailBos)->send(new SendMail($hari, $data->nama_proyek, $status));
        toast('Berhasil mengirim pesan!', 'success');
        return redirect(route($this->modul . '.index'));
    }
}
