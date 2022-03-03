<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Student;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    //
    public function index()
    {
        $absences = Absence::all()->sortBy('reply');
        return view('admin.absence.index', compact('absences'));
    }

    public function edit(Absence $absence)
    {
        return view('admin.absence.edit', compact('absence'));
    }

    public function update(Request $request, Absence $absence)
    {
        $absence->update([
            'reply' => $request->reply,
            'replied_by' => auth()->id(),
            'status' => (int)$request->status,
        ]);
        return back()->with('success', ' replied successfully');
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();
        return back()->with('delete', 'absence deleted successfully');
    }
}
