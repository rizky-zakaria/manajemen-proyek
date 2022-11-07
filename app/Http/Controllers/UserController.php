<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->modul = 'user';
    }

    public function index()
    {
        $modul = $this->modul;
        $title = "Daftar Pengguna";
        $data = User::where('role', '!=', 'admin')->get();
        return view('user.index', compact('data', 'title', 'modul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Daftar Pengguna";
        $modul = $this->modul;
        return view('user.create', compact('title', 'modul'));
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
            'required' => 'Field ini tidak boleh kosong',
            'confirmed' => 'Password tidak sama',
            'email' => 'Masukan email yang  valid',
            'string' => 'Masukan data yang valid',
            'max' => 'Tidak boleh melebihi 255 karakter',
            'unique' => 'Email sudah digunakan',
            'integer' => 'Harus berisi data angka'
        ];

        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'ttl' => ['required'],
            'nik' => ['required', 'integer'],
            'telepon' => ['required', 'integer'],
            'agama' => ['required'],
            'jk' => ['required']
        ], $messages);

        $post = new User;
        $post->name = $request->nama;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->role = $request->role;
        $post->save();

        $biodata = new Biodata;
        $biodata->user_id = $post->id;
        $biodata->alamat = $request->alamat;
        $biodata->nik = $request->nik;
        $biodata->telepon = $request->telepon;
        $biodata->agama = $request->agama;
        $biodata->jenis_kelamin = $request->jk;
        $biodata->ttl = $request->ttl;
        $biodata->save();

        toast('Berhasil menambahkan data!', 'success');
        return redirect(route('user.index'));
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
        $modul = $this->modul;
        $data = User::find($id);
        $biodata = Biodata::where('user_id', $id)->first();
        $biodata->delete();
        $data->delete();

        if ($data) {
            toast('Berhasil menghapus data!', 'success');
            return redirect(route($modul . '.index'));
        } else {
            toast('Gagal menghapus data!', 'error');
            return redirect(route($modul . '.index'));
        }
    }
}
