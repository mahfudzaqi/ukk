<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasir');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('no_meja', $request->no_meja);
        Session::flash('name', $request->name);
        Session::flash('pesanan', $request->pesanan);
        $request->validate([
            'no_meja' => 'required|numeric|unique:pesanan,no_meja',
            'name' => 'required',
            'pesanan' => 'required'
        ],[
            'no_meja.required' => 'no_meja wajib diisi',
            'no_meja.numeric' => 'no_meja wajib dalam bentuk angka',
            'no_meja.unique' => 'meja sudah dipesan',
            'name.required' => 'name wajib diisi',
            'pesanan.required' => 'pesanan wajib diisi'
        ]);
        $data = [
            'no_meja'=>$request->no_meja,
            'name'=>$request->name,
            'pesanan'=>$request->pesanan,
        ];
        pesanan::create($data);
        return redirect()->to('admin/kasir')->with('success', 'Data berhasil ditambahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
