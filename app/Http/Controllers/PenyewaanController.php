<?php

namespace App\Http\Controllers;
use App\Models\PenyewaanModel;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index(){
        $penyewa = PenyewaanModel::all();
        return view('penyewaan.datasewa',compact('penyewa'));
    }

    public function pengajuan(){
        return view('penyewaan.pengajuan');
    }

    public function postpengajuan(Request $request){
        $storedata = $request->validate([
            'tgldisewa' => 'required',
            'tglkembali' => 'required',

        ]);
        
        PenyewaanModel::create([
            'tanggal_disewa' => $request->tgldisewa,
            'tanggal_pengembalian' => $request->tglkembali,
            'tarif' => $request->tarif
        ]);

        return redirect()->route('penyewaan');
    }
}
