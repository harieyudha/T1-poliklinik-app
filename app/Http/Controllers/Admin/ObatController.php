<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->paginate(10);

        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan'   => 'required|string|max:35',
            'harga'     => 'required|integer|min:0',
        ], [
            'nama_obat.required' => 'Nama obat wajib diisi.',
            'kemasan.required'   => 'Kemasan wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'harga.integer'      => 'Harga harus berupa angka bulat.',
            'harga.min'          => 'Harga tidak boleh negatif.',
        ]);

        Obat::create($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit(Obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $validated = $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan'   => 'required|string|max:35',
            'harga'     => 'required|integer|min:0',
        ], [
            'nama_obat.required' => 'Nama obat wajib diisi.',
            'kemasan.required'   => 'Kemasan wajib diisi.',
            'harga.required'     => 'Harga wajib diisi.',
            'harga.integer'      => 'Harga harus berupa angka bulat.',
            'harga.min'          => 'Harga tidak boleh negatif.',
        ]);

        $obat->update($validated);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus.');
    }
}