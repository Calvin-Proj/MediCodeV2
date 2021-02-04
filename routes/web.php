<?php

use App\Models\User;
use App\Models\Campus;
use App\Models\Module;
use App\Models\Building;
use App\Http\Controllers\AccountEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvigController;
use App\Http\Controllers\StudentTestSched;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\LecturerDTController;
use App\Http\Controllers\InvigDTController;
use App\Http\Controllers\StudentDTController;
use App\Http\Controllers\SickNoteController;
use App\Http\Controllers\MisconductController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\InvigAssignController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Main route for Dashboard


//Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/landingpage', [LandingpageController::class, 'indexlanding'])->name('landingpage');
//one to one relationship test
Route::get('/read{id}', function($id)
{
  return User::find($id)->module->module_code;
});
//many to many relationship test
Route::get('/read/many',[HomeController::class, 'read']);
Route::get('/onetomany', function()
{
    $campus = Campus::find(1);
    foreach ($campus->buildings as $building) {
        echo $building->building_name;
    }
});

//Admin routes + Multi authenticate
Route::middleware(['checkUsertype:admin'])->group(function(){

//Resource Route for test.///////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('admods', ModuleController::class);
Route::get('get-admods', [ModuleController::class, 'getModules'])->name('get-admods');
Route::get('/admin/managemodule', [AdminController::class, 'indexmodule'])->name('adminmanagemodules');
//Resource Route for venues.
Route::resource('advenues', VenueController::class);
Route::get('get-advenues', [VenueController::class, 'getVenues'])->name('get-advenues');
Route::get('/admin/managevenue', [AdminController::class, 'indexvenue'])->name('adminmanagevenues');
//Resource Route for lecturers.
Route::resource('adlect', LecturerDTController::class);
Route::get('get-adlect', [LecturerDTController::class, 'getLecturers'])->name('get-adlect');
Route::get('/admin/adminmanagelecturers', [AdminController::class, 'indexlecturer'])->name('adminmanagelecturers');
//Resource Route for Invigs.
Route::resource('adinvig', InvigDTController::class);
Route::get('get-adinvig', [InvigDTController::class, 'getInvigs'])->name('get-adinvig');
Route::get('/admin/adminmanageinvigs', [AdminController::class, 'indexinvig'])->name('adminmanageinvigs');
Route::get('/admin/adminassigninvigs', [AdminController::class, 'indexassign'])->name('adminassigninvigs');
//Route::resource('adinvig', InvigAssignController::class);
Route::get('get-assinvig', [InvigAssignController::class, 'getTests'])->name('get-assinvig');
//Resource Route for Student.
Route::resource('adstud', StudentDTController::class);
Route::get('get-adstud', [StudentDTController::class, 'getStudents'])->name('get-adstud');
Route::get('/admin/managestudent', [AdminController::class, 'indexstudent'])->name('adminmanagestudents');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/help', [AdminController::class, 'indexhelp'])->name('adminhelp');
//Routes for admin editing account
Route::get('/admin/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/admin/edit{user}', [AccountEdit::class, 'update']);
});
//////////////////////////////////


//Lecturer routes + Multi authenticate
Route::middleware(['checkUsertype:lect'])->group(function(){

//Resource Route for test./////////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('lecttests', TestController::class);
Route::get('get-lecttests', [TestController::class, 'getTests'])->name('get-lecttests');
Route::get('/lecturer/managetests', [LecturerController::class, 'indextest'])->name('lecturermanagetest');
//Resource Route for sick notes. NB need help
Route::resource('lectsick', SickNoteController::class);
Route::get('get-lectsick', [SickNoteController::class, 'getSickNotes'])->name('get-lectsick');
Route::get('/lecturer/managesicknotes', [LecturerController::class, 'indexsicknotes'])->name('lecturermanagesicknotes');
//Resource Route for misconduct. NB need help
Route::get('get-lectmis', [MisconductController::class, 'getMisconduct'])->name('get-lectmis');
Route::get('/lecturer/viewmisconduct', [LecturerController::class, 'indexmiscon'])->name('lecturermanagemiscon');
//Resource Route for attendance. NB need help
Route::get('get-lectatt', [AttendanceController::class, 'getAttendance'])->name('get-lectatt');
Route::get('/lecturer/viewattendants', [LecturerController::class, 'indexattend'])->name('lecturermanageattendants');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Lecturer Navbar
Route::get('/lecturer/help', [LecturerController::class, 'indexhelp'])->name('lecturerhelp');



//Routes for lecturer editing account
Route::get('/lecturer/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/lecturer/edit{user}', [AccountEdit::class, 'update']);
});
/////////////////////////////////////


//Invig routes + Multi authenticate
Route::middleware(['checkUsertype:invig'])->group(function(){
//Invig Navbar
Route::get('/invig/help', [InvigController::class, 'indexhelp'])->name('invighelp');
//Resource Route for invig tests
Route::get('/invig/schedule', [InvigController::class, 'indexinvigschedule'])->name('invigschedules');
Route::get('get-invigschedtest', [InvigDTController::class, 'getInvigsTest'])->name('get-invigschedtest');
/////////////////////////////
Route::get('/invig/submisconduct', [InvigController::class, 'indexinvigmiscon'])->name('invigmisconduct');
Route::post('/invig/submisconduct', [InvigController::class, 'createinvigmiscon']);
//Routes for invigilator editing account
Route::get('/invig/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/invig/edit{user}', [AccountEdit::class, 'update']);
});
/////////////////////////////////


//Student routes + Multi authenticate
Route::middleware(['checkUsertype:stud'])->group(function(){
//Datatable for Student
Route::resource('tests', StudentTestSched::class);
Route::get('get-tests', [StudentTestSched::class, 'getTests'])->name('get-tests');
Route::resource('sicktests', StudentTestSched::class);
Route::get('get-sicktests', [StudentTestSched::class, 'getSickTests'])->name('get-sicktests');

//Student Navbar
Route::get('/student/help', [StudentController::class, 'indexhelp'])->name('studenthelp');
Route::get('/student/testschedule', [StudentController::class, 'index'])->name('studenttestsched');
 Route::get('/student/booksicktest', [StudentController::class, 'indexbooktest'])->name('studentbooksicktest');
Route::post('/student/booksicktest', [StudentController::class, 'fileUpload'])->name('fileUpload');
//Routes for student editing account
Route::get('/student/edit{user}', [AccountEdit::class, 'edit']);
Route::post('/student/edit{user}', [AccountEdit::class, 'update']);
});
////////////////////////////////////

//idk what this does but nice
require __DIR__.'/auth.php';
