<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    return view('student.index', [
            'title' => 'Student',
            'students' => student::latest()->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('student.create', ['title' => 'Create Student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'nim'  => 'required|numeric|digits:12',
    ], [
        'name.required' => 'Nama wajib di input',
        'nim.required'  => 'Nim wajib di input',
        'nim.numeric'   => 'Nim wajib berupa angka',
        'nim.digits'    => 'Nim wajib 12 digit',
    ]);

    student::create($validated);

    return to_route('student.index')->withSuccess('Data berhasil ditambahkan');

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
    public function edit(student $student)
    {
        return view('student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        $validated = $request->validate([
        'name' => 'required',
        'nim'  => 'required|numeric|digits:12',
    ], [
        'name.required' => 'Nama wajib di input',
        'nim.required'  => 'Nim wajib di input',
        'nim.numeric'   => 'Nim wajib berupa angka',
        'nim.digits'    => 'Nim wajib 12 digit',
    ]);

    $student->update($validated);

    return to_route('student.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();

    return to_route('student.index')->withSuccess('Data berhasil dihapus');
    }
}
