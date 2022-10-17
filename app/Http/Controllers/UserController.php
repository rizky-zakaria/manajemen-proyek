<?php

namespace App\Http\Controllers;

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
            'unique' => 'Email sudah digunakan'
        ];

        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ], $messages);

        $post = new User;
        $post->name = $request->nama;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->role = $request->role;
        $post->save();

        toast('Berhasil menambahkan data!', 'success');
        return redirect(url('user'));
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
