<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    //Show form to input using method get
    public function create(){
        return view('teacher.create');
    }

    //insert data to db using method post
    public function store(Request $request){
        //Request Class in laratvel is use for catch data from form
        //validation form when user input null (required)
        $request -> validate([
            "name"=>"required", 
            "gender"=>"required", 
            "skill"=>"required", 
            "salary"=> "required"
        ]);

        //catch data from form insert to db using method create
        Teacher::create([
            //columnNameInTable=>$request->nameInForm
            "name"=> $request->name, 
            "gender" => $request->gender,
            "skill"=> $request->skill,
            "salary"=>$request->salary
        ]);

        //after insert to db redirect to index page
        return redirect()->route('teacher.index');
    }

    //get all data from table and sent to view
    public function index(){
        $teacher = Teacher::all();

        return view('teacher.index', compact('teacher'));
    }

    public function update(){
        return "";
    }
}
