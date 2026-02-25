<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //index page of student
    public function index()
    {
        $allStudent = Student::all();
        return view('student.index', compact('allStudent'));
    }
    //show form
    public function create()
    {
        return view('student.create_student');
    }

    public function insert(Request $request)
    {
        //validate
        $request->validate([
            "full_name" => "required",
            "gender" => "required",
            "age" => "required",
            "phone_number" => "required",
            "dob" => "required",
            "image" => "required|mimes:jpg,png,jpeng"
        ]);

        //insert into db
        Student::create([
            //columnNameInTable=>$request->nameInForm
            "full_name" => $request->full_name,
            "gender" => $request->gender,
            "age" => $request->age,
            "phone_number" => $request->phone_number,
            "dob" => $request->dob,
            "image" => $request->file('image')->store('images', 'public')
        ]);

        //redirect to index page
        return redirect()->route('student.index');
    }

    //show form update
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.update_student', compact('student'));
    }

    //update data in db
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            "full_name" => "required",
            "gender" => "required",
            "age" => "required",
            "phone_number" => "required",
            "dob" => "required",
            "image" => "required|mimes:jpg,png,jpeng"
        ]);

        $findStudentById = Student::findOrFail($id);

        //update if found data
        $findStudentById->full_name = $request->full_name;
        $findStudentById->gender = $request->gender;
        $findStudentById->age = $request->age;
        $findStudentById->dob = $request->dob;
        $findStudentById->phone_number = $request->phone_number;
        $findStudentById->image =  $request->file('image')->store('images', 'public');

        //save to db
        $findStudentById->save();

        return redirect()->route('student.index');
    }

    //delete 
    public function delete($id){
        $findStudentById = Student::findOrFail($id);

        $findStudentById->delete();
        return redirect()->route('student.index');
    }
}
