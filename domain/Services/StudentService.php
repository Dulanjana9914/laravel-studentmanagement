<?php

namespace domain\Services;

use App\Models\Student;
use infrastructure\Facades\ImagesFacade;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function store($data)
    {
        if (isset($data['image'])) {
            $image = ImagesFacade::store($data['image'], [1, 2, 3, 4, 5]);
            $data['image'] = $image['created_images']->id;
        }
        $this->student->create($data);
    }

    public function all()
    {
        return $this->student->all();
    }

    public function delete($student_id)
    {

        $student = $this->student->find($student_id);

        $student->delete();
    }

    public function get($student_id)
    {
        return $this->student->find($student_id);
    }

    public function statusUpdate($student_id)
    {

        $student = $this->student->find($student_id);

        if ($student->status == "active") {
            $student->status = "inactive";
        } else {
            $student->status = "active";
        }
        $student->update();
    }

    public function update(array $data, $student_id)
    {

        $student = $this->student->find($student_id);

        $student->update($this->edit($student, $data));

        return redirect()->back();
    }

    protected function edit(Student $student, $data)
    {
        return array_merge($student->toArray(), $data);
    }
}