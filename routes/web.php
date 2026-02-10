<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentsControllerPart2;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// //-->>Simple Route
// Route::get('/test', function(){
//     return "Hello , World!";
// });


// //-->>Route return to view
// Route::get('/greeting', function(){
//     return view('test');
// });

// Route::get('auth/login', function(){
//     return view('page.login');
// });


// //--->>Route with Parameter (Dynamic Route)
// Route::get('/user/{id}', function ($id) {
//     return 'User id : ' . $id;
// });


// //--->>Route with Controller
// Route::get('/student', [StudentController::class, 'index']);
// //Route::get('/studentList', [StudentController::class, 'studentList']);
// //route::get('route_name', [Controller_name::class, function_name])


// //-->>Group Route with normal route
// Route::group([] ,function(){
//     Route::get('/contact', function(){
//         return "Contact us with this phone number";
//     });
//     Route::get('/check/otp', function(){
//         return "reset password";
//     });
// });


// //-->Group Route with Controller
// Route::controller(StudentController::class)->group(function(){
//     Route::get('/stuent', 'index');
//    // Route::get('/studentList', 'studentList');
// });


//--------------catch data from controller to show on view-----------------
Route::get('/student-list', [StudentController::class, 'studentList']);



//-----Exercise 1 about redirect page with controller
Route::controller(PageController::class)->group(function(){
    Route::get('/', 'homePage' );
    Route::get('/about','aboutPage');
    Route::get('/service', 'servicePage');
    Route::get('/contact', 'contactPage');
});


//------Exercise 2 about get data from controller to show on table in view
Route::get('/student-list2', [StudentsControllerPart2::class, 'index']);