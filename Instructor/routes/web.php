<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;

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
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/registration',[InstructorController::class,'registration'])->name('instructor.registration');

Route::post('/registration',[InstructorController::class,'registrationSubmit'])->name('instructor.registration.submit');






Route::get('/login',[InstructorController::class,'login'])->name('instructor.login');

Route::post('/login',[InstructorController::class,'loginSubmit'])->name('instructor.login.submit');
Route::get('/home',[InstructorController::class,'home'])->name('instructor.home')->middleware('instructorLoggedCheck');
Route::get('/profile',[InstructorController::class,'profile'])->name('instructor.profile')->middleware('instructorLoggedCheck');
Route::get('/updateProfile',[InstructorController::class,'updateProfile'])->name('instructor.updateProfile')->middleware('instructorLoggedCheck');
Route::post('/updateProfile',[InstructorController::class,'updateProfileSubmit'])->name('instructor.updateProfile.submit')->middleware('instructorLoggedCheck');
Route::get('/appointments',[InstructorController::class,'appointments'])->name('instructor.appointments')->middleware('instructorLoggedCheck');
Route::get('/appointment/status/accept/{id}',[InstructorController::class,'appointmentStatusAccept'])->name('appointment.status.accept')->middleware('instructorLoggedCheck');

Route::get('/appointment/status/cancel/{id}',[InstructorController::class,'appointmentStatusCancel'])->name('appointment.status.cancel')->middleware('instructorLoggedCheck');
Route::get('/appointment/status/pending/{id}',[InstructorController::class,'appointmentStatusPending'])->name('appointment.status.pending')->middleware('instructorLoggedCheck');
Route::get('/session_Schedules',[InstructorController::class,'session_Schedules'])->name('instructor.session_Schedules')->middleware('instructorLoggedCheck');
Route::get('/announcement',[InstructorController::class,'announcement'])->name('instructor.announcement')->middleware('instructorLoggedCheck');
Route::post('/announcement',[InstructorController::class,'announcementPublish'])->name('instructor.announcementPublish')->middleware('instructorLoggedCheck');
Route::get('/feedback',[InstructorController::class,'feedback'])->name('instructor.feedback')->middleware('instructorLoggedCheck');
Route::post('/feedback',[InstructorController::class,'feedbackSend'])->name('instructor.feedbackSend')->middleware('instructorLoggedCheck');
Route::get('/changePassword',[InstructorController::class,'changePassword'])->name('instructor.changePassword')->middleware('instructorLoggedCheck');
Route::post('/changePassword',[InstructorController::class,'changePasswordUpdate'])->name('instructor.changePasswordUpdate')->middleware('instructorLoggedCheck');
Route::get('/forgotPassword',[InstructorController::class,'forgotPassword'])->name('instructor.forgotPassword');
Route::post('/forgotPassword',[InstructorController::class,'forgotPasswordUpdate'])->name('instructor.forgotPasswordUpdate');

Route::get('/logout',[InstructorController::class,'logout'])->name('instructor.logout')->middleware('instructorLoggedCheck');




