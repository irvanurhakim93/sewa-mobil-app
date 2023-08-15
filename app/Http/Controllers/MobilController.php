<?php

namespace App\Http\Controllers;

use App\Models\MobilModel;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index() {
        $mobil = MobilModel::all();
        return view('mobil.datamobil',compact('mobil'));    
    }

    public function tambahmobil() {
        return view('mobil.tambahmobil');
    }

    public function postmobil(Request $request){
        $storedata = $request->validate([
            'modelmobil' => 'required',
            'platmobil' => 'required',
            'tarif' => 'required',
        ]);
        
        MobilModel::create([
            'model_mobil' => $request->modelmobil,
            'plat_mobil' => $request->platmobil,
            'tarif' => $request->tarif
        ]);

        return redirect()->route('datamobil');
    }
        
    
}
