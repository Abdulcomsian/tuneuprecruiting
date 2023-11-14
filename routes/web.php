<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentApplyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/dashboard', function () {
//    return view('backend/dashboard/dashboard');
    return redirect('/applies');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::resource('program', ProgramController::class);

    Route::get("/chat/{id}/{type}/{messageId?}", [ChatController::class, "show"])->name('chat');
    Route::post("/chat/store", [ChatController::class, "store"])->name('chat.store');

    Route::get('/applies', [ApplyController::class, 'applies']);
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/update/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image');

    // student
//    Route::get('/student/dashboard', [StudentDashboard::class, 'dashboard']);
    Route::get('/student/dashboard', [StudentApplyController::class, 'programs']);
    Route::get('/program/apply/{programId}', [StudentApplyController::class, 'studentApply']);
    Route::get('/student/applies', [StudentApplyController::class, 'applies']);
    Route::get('/profile/student', [StudentProfileController::class, 'profile']);
    Route::post('/update/student/profile', [StudentProfileController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/program/view/{id}', [StudentApplyController::class, 'viewProgram'])->name('program.view');

    // Messages
    Route::get('/notification/messages', [MessageController::class, 'notificationMessages']);
});

require __DIR__.'/auth.php';
