<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postregist(Request $request)
    {
        $storedata = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'nosim' => 'required',
            'password' => 'required'
        ]);
        
        Users::create([
            'name' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nohp,
            'nomor_sim' => $request->nosim,
            'password' => $request->password
        ]);

        $credentials = $request->only('nomor_telepon','password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    

    
    public function authenticate(Request $request)
    {
        $request->validate([
            'nohp' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['nomor_telepon' => $request->nohp, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        

        return back()->withErrors([

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::attempt()) {
            return view('dashboard');
        }

        return redirect()->route('login')
        ->withErrors([
            'inputnohp' => 'Mohon login kembali untuk dapat mengakses dashboard'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('Anda telah berhasil logout');
    }
}
