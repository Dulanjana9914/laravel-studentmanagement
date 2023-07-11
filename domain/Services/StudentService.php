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
        if(isset($data['image'])){
        $image = ImagesFacade::store($data['image'],[1,2,3,4,5]);
        $data['image'] = $image['created_images']->id;
        }
         $this->student->create($data);

    }


    public function all()
    {

        return $this->student->all();

    }
}