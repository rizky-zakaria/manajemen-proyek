<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Gantt;
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
        if (Auth::user()->role !== "petugas") {
            $data = Proyek::all();
        } else {
            $data = Proyek::where('user_id', Auth::user()->id)->get();
        }
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
        // dd($request);
        $messages = [
            'required' => 'Field wajib diisi',
            'max' => 'Field tidak boleh kurang dari 8 karakter',
            'string' => 'Field hanya bisa diisi oleh text',
            'integer' => 'Harus berisi data angka',
            'mimes' => 'Format file tidak didukung'
        ];

        $this->validate($request, [
            'nama_proyek' => ['required', 'min:8', 'string'],
            'lokasi' => ['required', 'min:8', 'string'],
            'waktu_mulai' => ['required', 'date'],
            'waktu_selesai' => ['required', 'date'],
            'petugas' => ['required'],
            'anggaran' => ['integer', 'required'],
            'keterangan' => ['required']
            // 'file' => ['required', 'mimes:pdf,jpeg,jpg,png,docx,xls', 'max:2048']
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
                $post->jenis = $request->jenis_proyek;
                $post->bidang = $request->jenis;
                $post->user_id  = $request->petugas;
                $post->anggaran = $request->anggaran;
                $post->keterangan = $request->keterangan;
                $post->save();
                toast('Berhasil menambahkan data!', 'success');
                return redirect('data-master/proyek');
            }
            toast('Gagal menambahkan data!', 'error');
            return redirect('data-master/proyek');
        }
        toast('Gagal menambahkan data!', 'error');
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
        $data = Proyek::find($id);
        $timeline = Gantt::where('project_id', $id)->get();
        $modul = $this->modul;
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $kanbanToDo = Gantt::where(['project_id' => $id, 'percent' => 0])->get();
        $kanbanInPro = Gantt::where('project_id', $id)
            ->where('percent', '<', 100)
            ->where('percent', '>', 0)
            ->get();
        $kanbanDone = Gantt::where('project_id', $id)
            ->where('percent', 100)
            ->get();
        $file = Dokumen::where('proyek_id', $id)->get();
        return view('project.show', compact('data', 'modul', 'timeline', 'bulan', 'kanbanToDo', 'kanbanInPro', 'kanbanDone', 'file', 'id'));
    }

    public function formUpdateProgres($id)
    {
        $data = Gantt::where('task_id', $id)->first();
        $modul = $this->modul;
        return view('project.form-update-progres', compact('data', 'modul'));
    }

    public function updateProgres(Request $request)
    {
        $post = Gantt::where('task_id', $request->id)->update(['percent' => $request->progres]);

        if ($post) {
            toast('Berhasil Mengubah Data!', 'success');
        } else {
            toast('Gagal Mengubah Data!', 'error');
        }
        return redirect(route('proyek.index'));
    }

    public function gantt($id)
    {
        $data = Gantt::where('project_id', $id)->get();
        $modul = $this->modul;
        // dd($data);
        return view('project.gantt', compact('data', 'id', 'modul'));
    }

    public function ganttByProject($id)
    {
        $data = Gantt::where('project_id', $id)->get();
        return response()->json($data);
    }

    public function ganttPost(Request $request)
    {
        $post = Gantt::create([
            'task_id' => date('dmYHis'),
            'task_name' => $request->nama,
            'resource' => $request->resource,
            'tgl_mulai' => $request->tanggal_mulai,
            'bln_mulai' => $request->bulan_mulai,
            'thn_mulai' => $request->tahun_mulai,
            'tgl_selesai' => $request->tanggal_selesai,
            'bln_selesai' => $request->bulan_selesai,
            'thn_selesai' => $request->tahun_selesai,
            'duration' => null,
            'percent' => 0,
            'dependencies' => null,
            'project_id' => $request->id
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Proyek::find($id);
        $modul = $this->modul;
        $user = User::where('role', 'petugas')->get();
        return view('project.edit', compact('data', 'modul', 'user'));
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
        $messages = [
            'required' => 'Field wajib diisi',
            'max' => 'Field tidak boleh kurang dari 8 karakter',
            'string' => 'Field hanya bisa diisi oleh text',
            'integer' => 'Harus berisi data angka',
            'mimes' => 'Format file tidak didukung'
        ];

        $this->validate($request, [
            'nama_proyek' => ['required', 'min:8', 'string'],
            'lokasi' => ['required', 'min:8', 'string'],
            'waktu_mulai' => ['required', 'date'],
            'waktu_selesai' => ['required', 'date'],
            'petugas' => ['required'],
            'anggaran' => ['integer', 'required'],
            // 'file' => ['required', 'mimes:pdf,jpeg,jpg,png,docx,xls', 'max:2048']
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
                $post = Proyek::find($id);
                $post->nama_proyek = $request->nama_proyek;
                $post->lokasi = $request->lokasi;
                $post->waktu_mulai = $request->waktu_mulai;
                $post->waktu_selesai = $request->waktu_selesai;
                $post->status = 'proses';
                $post->file = $rename;
                $post->user_id  = $request->petugas;
                $post->anggaran = $request->anggaran;
                $post->update();
                toast('Berhasil mengubah data!', 'success');
                return redirect('data-master/proyek');
            }
            toast('Gagal mengubah data!', 'error');
            return redirect('data-master/proyek');
        }
        toast('Gagal mengubah data!', 'error');
        return redirect('data-master/proyek');
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

    public function downloadByDate(Request $request)
    {
        $data = Proyek::whereBetween('waktu_mulai', [$request->start, $request->end])->get();
        // dd($data);
        return view('project.download', compact('data'));
    }

    public function detail($id)
    {
        $modul = $this->modul;
        return view('project.detail', compact('modul'));
    }
}
