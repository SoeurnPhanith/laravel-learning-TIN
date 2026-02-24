<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $table = "tbl_teachers";

    //specific column name in table
    protected $fillable = [
        "name", 
        "gender",
        "skill", 
        "salary" ,
        "image"
    ];
}
