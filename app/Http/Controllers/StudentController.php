<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use domain\Facades\StudentFacade;
use infrastructure\Facades\ImagesFacade;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Students/Index', [
            'students' => Student::all()->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'age' => $student->age,
                    'image' => asset('storage/app/public' . $student->image),
                    'status' => $student->status,
                ];
            }),
        ]);
    }

    public function store(Request $request)
    {

        $image = Request()->file('image')->store('images', 'public');
        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'image' => $image
        ]);
        return redirect()->back();
    }
    public function delete($student_id)
    {
        return StudentFacade::delete($student_id);
    }

    public function statusUpdate($student_id)
    {
        return StudentFacade::statusUpdate($student_id);
    }

    public function get($student_id)
    {
        $student = StudentFacade::get($student_id);
        return response()->json($student);
    }

    public function edit()
    {
        return Inertia::render('Students/Update');
    }

    public function update(Request $request, $student_id)
    {
        StudentFacade::update($request->all(), $student_id);
        return redirect()->back();
    }

    public function list()
    {
        $students = StudentFacade::all();
        return response()->json($students);
    }
}