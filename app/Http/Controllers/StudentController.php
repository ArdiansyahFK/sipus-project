<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%");
        }

        $students = $query->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required|max:100',
            'nis' => 'required|unique:siswa,nis|max:50',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|max:255',
            'tanggal_lahir' => 'nullable|date',
            'foto' => 'nullable|url|max:255',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'kelas' => 'required|max:100',
            'nis' => 'required|unique:siswa,nis,' . $student->id . '|max:50',
            'jk' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|max:255',
            'tanggal_lahir' => 'nullable|date',
            'foto' => 'nullable|url|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil diubah');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}
