<?php

// app/Http/Controllers/AlatMusikController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatMusik;
use App\Models\User;
use Illuminate\Support\Facades\Hash;







class AlatMusikController extends Controller
{
    public function index()
    {
        $alatMusiks = AlatMusik::all();
        return view('index', compact('alatMusiks'));
    }

    public function show($id)
    {
        
        $alatMusik = AlatMusik::find($id);
        return view('show', compact('alatMusik'));
        if (!$alatMusik) {
            abort(404); // atau redirect ke halaman lain, sesuai kebutuhan
        }
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'stok' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        
    ]);

    // Simpan gambar ke direktori storage
    $gambarPath = $request->file('gambar')->store('', 'public');


    // Buat data alat musik dengan nama file gambar
    $alatMusik = AlatMusik::create([
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga'),
        'deskripsi' => $request->input('deskripsi'),
        'stok' => $request->input('stok'),
        'gambar' => $gambarPath
    ]);

    return redirect()->route('index')->with('success', 'Alat musik berhasil ditambahkan.');
}

    public function edit($id)
    {
        $alatMusik = AlatMusik::find($id);
        return view('edit', compact('alatMusik'));
    }

    public function update(Request $request, $id)
    {
        $alatMusik = AlatMusik::find($id);
        $alatMusik->update($request->all());
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $alatMusik = AlatMusik::find($id);
        $alatMusik->delete();
        return redirect()->route('index');
    }
}
