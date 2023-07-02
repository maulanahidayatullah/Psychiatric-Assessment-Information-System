<?php

namespace App\Http\Controllers;

use App\Models\HasilSDQ;
use App\Models\HasilSRQ;
use Illuminate\Http\Request;

class KuisionerController extends Controller
{
    // ini buat API
    public function inputSDQ(Request $request)
    {
        $data = new HasilSDQ();
        $data->nama             = strtoupper($request->nama);
        $data->instansi         = strtoupper($request->instansi);
        $data->total_kesulitan  = strtoupper($request->total_kesulitan);
        $data->hasil_e          = strtoupper($request->hasil_e);
        $data->hasil_c          = strtoupper($request->hasil_c);
        $data->hasil_h          = strtoupper($request->hasil_h);
        $data->hasil_p          = strtoupper($request->hasil_p);
        $data->hasil_pro        = strtoupper($request->hasil_pro);
        $data->save();

        if ($data->save()) {
            return response()->json([
                'success' => true,
                'note' => 'Data Berhasil Di Input'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'note' => 'Data Gagal Di Input'
            ], 400);
        }
    }

    // ini buat API
    public function inputSRQ(Request $request)
    {

        $data = new HasilSRQ();
        $data->nama         = strtoupper($request->nama);
        $data->umur         = strtoupper($request->umur);
        $data->no_hp        = strtoupper($request->no_hp);
        $data->alamat       = strtoupper($request->alamat);
        $data->pekerjaan    = strtoupper($request->pekerjaan);
        $data->hasil        = strtoupper($request->hasil);
        $data->save();

        if ($data->save()) {
            return response()->json([
                'success' => true,
                'note' => 'Data Berhasil Di Input'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'note' => 'Data Gagal Di Input'
            ], 400);
        }
    }
}
