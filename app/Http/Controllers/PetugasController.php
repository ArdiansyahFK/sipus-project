<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $query = Petugas::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('telepon', 'like', "%{$search}%");
        }

        $petugas = $query->paginate(10);
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:petugas,nip|max:50',
            'nama' => 'required|max:255',
            'jk' => 'required|in:L,P',
            'telepon' => 'nullable|max:20',
            'foto' => 'nullable|url|max:255',
        ]);

        Petugas::create($validated);

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    public function show(Petugas $petugas)
    {
        return view('petugas.show', compact('petugas'));
    }

    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:petugas,nip,' . $petugas->id . '|max:50',
            'nama' => 'required|max:255',
            'jk' => 'required|in:L,P',
            'telepon' => 'nullable|max:20',
            'foto' => 'nullable|url|max:255',
        ]);

        $petugas->update($validated);

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil diubah');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil dihapus');
    }
}
