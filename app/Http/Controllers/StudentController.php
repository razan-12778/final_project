<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    //
    public function index()
    {
        return view('students.index');
    }

    public function edit(Student $student)
    {
        return view('students.profile',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'id' => 'required|unique:students,id,' . $student->id,
            'name' => 'required|min:3',
            'email' => 'required|unique:students,email,' . $student->id,
            'phone' => '',
            'avatar' => 'image',
        ]);

        $student->update([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'avatar' => null
        ]);
        if (!empty($student->password) && !empty($student->password_confirmation)) {
            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);
            $student->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->crop(500, 500);
            $student->update(['avatar' => 'student/avatar/' . $fileName]);
            $img->stream();
            Storage::disk('public')->put('student/avatar/' . $fileName, $img, 'public');
        }
        return redirect(route('student.edit', $student))->with('success', 'Edited successfully');
    }
}
