<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginAPIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("instructor/register", [InstructorController::class, 'InstructorRegisterAPI']);
Route::post("instructor/register/otp", [InstructorController::class, 'InstructorRegisterOTPAPI']);
Route::post("instructor/dashboard", [InstructorController::class, 'InstructorDashboardAPI'])->middleware("instructorLoggedToken");
Route::post("instructor/profile", [InstructorController::class, 'InstructorProfileAPI'])->middleware("instructorLoggedToken");
Route::post("instructor/logout", [InstructorController::class, 'InstructorLogoutAPI'])->middleware("instructorLoggedToken");
Route::post("instructor/profile/update", [InstructorController::class, 'InstructorProfileUpdateAPI'])->middleware("instructorLoggedToken");
Route::post("instructor/appointments", [InstructorController::class, 'InstructorAppointments'])->middleware("instructorLoggedToken");
Route::post("instructor/appointments/accept/{id}", [InstructorController::class, 'InstructorAppointmentsAccept'])->middleware("instructorLoggedToken");
Route::post("instructor/appointments/cancel/{id}", [InstructorController::class, 'InstructorAppointmentsCancel'])->middleware("instructorLoggedToken");
Route::post("instructor/appointments/pending/{id}", [InstructorController::class, 'InstructorAppointmentsPending'])->middleware("instructorLoggedToken");
Route::post("instructor/login", [LoginAPIController::class, 'login']);
Route::get("sendmail", [InstructorController::class, 'sendMail']);
Route::post("instructor/sessionSchedule", [InstructorController::class, 'InstructorSessionSchedule'])->middleware("instructorLoggedToken");
Route::post("instructor/announcement", [InstructorController::class, 'InstructorAnnouncement']);
Route::post("instructor/feedback", [InstructorController::class, 'InstructorFeedback']);
Route::post("instructor/changePassword", [InstructorController::class, 'InstructorChangePassword']);