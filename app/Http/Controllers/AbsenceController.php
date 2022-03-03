<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AbsenceController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:pdf|max:10000'
        ]);
        if ($request->hasFile('file')) {
//            $clientCv = $clientInformation->file;
//            $file = File::exists('storage/' . $clientCv);
//            if ($file) {
//                File::delete('storage/' . $clientCv);
//            }
            $attributes = $request->validate([
                'file' => 'required|file|mimes:pdf|max:10000'
            ]);
            $attributes['file'] = $request->file->store('student/file');
            Absence::create([
                'student_id'=>auth('student')->id(),
                'file'=>$attributes['file'],
                'status'=>false,
            ]);
        }
        return back()->with('success','file uploaded successfully');
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();
        return back()->with('delete','absence deleted successfully');
    }
}
