<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    //Show form to input using method get
    public function create()
    {
        return view('teacher.create');
    }

    //insert data to db using method post
    public function store(Request $request)
    {
        //Request Class in laratvel is use for catch data from form
        //validation form when user input null (required)
        $request->validate([
            "name" => "required",
            "gender" => "required",
            "skill" => "required",
            "salary" => "required",
            "image" => "required|mimes:jpg,png,jpeng"
        ]);

        //catch image from form user upload to store in images folder in public folder
        $teacherImage = $request->file('image')->store('images','public');

        //catch data from form insert to db using method create
        Teacher::create([
            //columnNameInTable=>$request->nameInForm
            "name" => $request->name,
            "gender" => $request->gender,
            "skill" => $request->skill,
            "salary" => $request->salary,
            "image"=>$teacherImage
        ]);

        //after insert to db redirect to index page
        return redirect()->route('teacher.index');
    }

    //get all data from table and sent to view
    public function index()
    {
        $teacher = Teacher::all();

        return view('teacher.index', compact('teacher'));
    }


    //throw data from view by id to show on form for update
    public function edit($id)
    {
        //findTeacherById
        $teacher = Teacher::findOrFail($id);

        return view('teacher.update', compact('teacher'));
    }

    //update teacherById
    public function update(Request $request, $id)
    {
        //Validation all filed must required
        $request->validate([
            "name" => "required",
            "gender" => "required",
            "skill" => "required",
            "salary" => "required", 
            "image" => "required|mimes:jpg,png,jpeng"
        ]);

        //findById
        $findTeacherById = Teacher::findOrFail($id);

        //if find found update it who get from form for save
        $findTeacherById->name = $request->name;
        $findTeacherById->gender = $request->gender;
        $findTeacherById->skill = $request->skill;
        $findTeacherById->salary = $request->salary;
        if($request->hasFile('image')){
             $imageName = $request->file('image')->store('images','public');
             $findTeacherById->image = $imageName;
        }

        //after update save it into db// save to database
        $findTeacherById->save();

        //redirect to index Page
        return redirect()->route('teacher.index');
    }

    //delete Teacher By id
    public function delete($id)
    {
        $deleteTeacherById = Teacher::findOrFail($id);

        $deleteTeacherById->delete();   

        return redirect()->route('teacher.index');
    }
}
