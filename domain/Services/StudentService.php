<?php

namespace domain\Services;

use App\Models\Student;
use Infrastructure\Facade\ImagesFacade;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function all()
    {

        return $this->student->all();

    }
}