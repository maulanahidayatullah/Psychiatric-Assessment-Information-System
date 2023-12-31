<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::orderBy("id", "desc")->get();
        $user = User::where('status_verif', 'true')->get();

        return view('notifikasi.view', [
            'judul' => 'Notifikasi',
            'notif' => $notifikasi,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $notifikasi             = new Notifikasi();
        $notifikasi->user_id    = $request->user_id;
        $notifikasi->tanggal    = $request->tanggal;
        $notifikasi->isi        = $request->isi;
        $notifikasi->save();

        Alert::success('Data Berhasil Ditambahkan');
        return redirect()->route('notifikasi');
        // return view('kuisioner.hasil.hasil_sdq', compact('total', 'total_e', 'total_c', 'total_h', 'total_p', 'total_pro', 'hasil_kesulitan', 'hasil_e', 'hasil_c', 'hasil_h', 'hasil_p', 'hasil_pro', 'nama', 'instansi', 'umur'));
        // }
    }
}
