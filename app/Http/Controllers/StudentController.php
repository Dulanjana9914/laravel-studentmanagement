<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use domain\Facades\StudentFacade;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Students/Index', [
            'students' => StudentFacade::all()->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'age' => $student->age,
                    'image' => asset('storage/'.$student->image),
                    'status' => $student->status,
                ];
            }),
          ]);
    }

    public function store(Request $request)
    {
        Student::create([
          'name' => $request->name,
          'age' => $request->age,
          'image'=> $request->image->store('images','public'),
        ]);

        return back();
    }
}