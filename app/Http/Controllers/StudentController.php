<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('students.index', compact('users'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Password::defaults()],
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['imagePath'] = $request->file('image')->store('students', 'public');
        }

        User::create($data);

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    public function show(User $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(User $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Password::defaults()],
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($student->imagePath) {
                Storage::disk('public')->delete($student->imagePath);
            }
            $data['imagePath'] = $request->file('image')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('profile.index')->with('success', 'Student updated successfully');
    }

    public function destroy(User $student)
    {
        if ($student->imagePath) {
            Storage::disk('public')->delete($student->imagePath);
        }

        $student->delete();

        return redirect()->route('login')->with('success', 'Student deleted successfully');
    }
}
