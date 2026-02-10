<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsControllerPart2 extends Controller
{
    //
    public function index(){
        $students = [
            [
                'id' => 1,
                'name' => 'Soeurn Phanith',
                'age' => 20,
                'gender' => 'male',
                'skill' => 'full stack mobile app dev'
            ],
            [
                'id' => 2,
                'name' => 'Srouch Tin',
                'age' =>21 ,
                'gender' => 'male',
                'skill' => 'Khuu Anh'
            ],
            [
                'id' => 3,
                'name' => 'Meas Mara',
                'age' =>21 ,
                'gender' => 'male',
                'skill' => 'full stack Web dev'
            ],
            [
                'id' => 4,
                'name' => 'Pheab Slot sahav',
                'age' =>21 ,
                'gender' => 'male',
                'skill' => 'Web backend'
            ]
        ];
        return view('student.students_part2', ['students'=>$students]);
    }
}
