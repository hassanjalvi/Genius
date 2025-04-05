<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    /**i
     * Display a listing of the resource.
     */
    public function addInstructors()
    {
        $instructor = User::where('role', 'instructor')->with('instructor')->get();
        return view('Admin.addinstructors');
    }
    public function manageInstructors()
    {
        $instructor = User::where('role', 'instructor')->with('instructor')->get();
        return view('Admin.manageinstructors', compact('instructor'));
    }

    public function createInstructors(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'expertise' => 'required',

        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'instructor',
        ]);

        $expertise = Instructor::create([
            'user_id' => $user->id,
            'expertise' => $request->expertise,
        ]);

        return redirect()->route('instructors.manage')->with('success', 'Instructor added successfully');

    }

    public function deleteInstructor($id)
    {

        $instructor = User::findOrFail($id); // Find user by ID
        $instructor->delete(); // Delete user

        return redirect()->back()->with('success', 'Instructor deleted successfully!');

    }
    public function updateInstructor(Request $request, $id)
    {
        $instructor = User::where('id', $id)->with('instructor')->first();

        $instructor->update([
            'name' => $request->name ?? $instructor->name,
            'email' => $request->email ?? $instructor->email,
            'status' => $request->status ?? $instructor->status,
        ]);

        if ($instructor->instructor) {
            $instructor->instructor->update([
                'expertise' => $request->expertise ?? $instructor->instructor->expertise,
            ]);
        }


        return redirect()->back()->with('success', 'Instructor updated successfully!');

    }

}
