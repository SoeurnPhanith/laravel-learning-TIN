<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        return "Hello Kru toch";
    }

    public function studentList(){
        $studentList = [
            [
                'name' => "Soeurn Phanith",
                'age'  => 20,
                'skill' => 'Full Stack mobile App',
                'salary' => 1000
            ],
            [
                'name' => "Srouch Tin",
                'age'  => 21,
                'skill' => 'Kru Anh',
                'salary' => 950
            ],
              [
                'name' => "Pheab kmeng slot",
                'age'  => 21,
                'skill' => 'sl ss ke mnak eng',
                'salary' => 950
            ],
        ];
        return view('student.students', ['students' => $studentList]);
    }
}
