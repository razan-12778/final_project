<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class StudentLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {

        $this->middleware('guest:student')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if (auth('student')->check()) {
            return redirect()->route('student.index');
        }
    }

    public function showLoginForm()
    {
        return view('students.auth.login');
    }

    public function username()
    {
        return 'id';
    }

    public function showRegisterForm()
    {
        return view('students.auth.register');
    }

    public function guard()
    {
        return Auth::guard('student');
    }

    public function register(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:students,id',
            'name' => 'required|min:3',
            'email' => 'required|unique:students,email',
            'password' => 'required|confirmed|min:6',
            'phone' => '',
            'avatar' => 'image',
        ]);
        $student = Student::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'avatar' => null
        ]);

        auth('student')->login($student,true);

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
        return redirect()->route('student.index');

    }


    public function logout()
    {
        auth('student')->logout();
        return redirect()->route('student.login');
    }
}
