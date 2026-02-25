<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = "tbl_students";

    protected $fillable = [
        "full_name", 
        "gender", 
        "age", 
        "phone_number", 
        "dob", 
        "image"
    ];
}
