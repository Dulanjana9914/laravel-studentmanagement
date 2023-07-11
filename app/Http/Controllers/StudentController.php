<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use domain\Facades\StudentFacade;

class StudentController extends ParentController
{
    public function index()
    {
        return Inertia::render('Students/Index', [
            'students' => StudentFacade::all()->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'age' => $student->age,
                    'image' => asset('students/'.$student->image),
                    'status' => $student->status,
                ];
            }),
          ]);
    }

    public function store(Request $request)
    {
        $image=Request()->file('image')->store();
        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'image'=> $image

        ]);
        return back();
    }
    public function delete($student_id)
    {
        return StudentFacade::delete($student_id);
    }



    public function statusUpdate($student_id)
    {

        StudentFacade::statusUpdate($student_id);
        return redirect()->back();

    }

    public function get($student_id)
    {
        $student = StudentFacade::get($student_id);
        return response()->json($student);

    }

    public function edit(Request $request)
    {
        $response ['students'] = StudentFacade::get($request['student_id']);

        return view ('pages.studens.edit')->with($response);
    }

    public function update(Request $request,$student_id)
    {
        return StudentFacade::update($request->all (),$student_id);

    }

}
