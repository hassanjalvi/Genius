<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageStudents()
    {
        $students = User::where('role', 'user')->get();
        return view('Admin.managestudents', compact('students'));
    }

    public function studentDelete($id)
    {

        $student = User::findOrFail($id); // Find user by ID
        $student->delete(); // Delete user

        return redirect()->back()->with('success', 'User deleted successfully!');

    }
    public function studentUpdate(Request $request, $id)
    {

        $students = User::where('id', $id)->first();

        $students->update([
            'name' => $request->name ?? $students->name,
            'email' => $request->email ?? $students->email,
            'status' => $request->status ?? $students->status,
        ]);

        return redirect()->back()->with('success', 'User deleted successfully!');

    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
