<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentApplyController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\RecruiterController;

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
    return redirect('/dashboard');
    //return view('frontend/index');
});

Route::get('/dashboard', function () {
//    return view('backend/dashboard/dashboard');
    if (auth()->user()->role == 'coach') {
        return redirect('/applies');
    } elseif (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/student/dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'decrypt.id'])->group(function () {
    // admin
    Route::get('/admin/dashboard', [AdminDashboard::class, 'dashboard']);
    Route::resource('recuriter', RecruiterController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::resource('program', ProgramController::class);

    Route::get("/chat/{id?}", [ChatController::class, "show"])->name('chat');
    Route::get("/chat/new/{id}", [ChatController::class, "getNewMessages"])->name('chat.new');
    Route::post("/chat/store", [ChatController::class, "store"])->name('chat.store');
    Route::get('/notification/messages', [ChatController::class, 'notificationMessages']);

    Route::get('/applies', [ApplyController::class, 'applies']);
    Route::get('/apply/status/{id}', [ApplyController::class, 'changeStatusToStar']);
    Route::delete('/apply/destroy/{id}', [ApplyController::class, 'destroy'])->name('apply.destroy');
    Route::get('/apply/view/{id}', [ApplyController::class, 'viewApply']);
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/update/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image');

    // student
    Route::get('/student/dashboard', [StudentApplyController::class, 'programs']);
    Route::get('/program/apply/{id}', [StudentApplyController::class, 'studentApply']);
    Route::post('/program/apply/{id}', [StudentApplyController::class, 'apply'])->name('program.apply');
    Route::get('/student/applies', [StudentApplyController::class, 'applies']);
    Route::get('/profile/student', [StudentProfileController::class, 'profile']);
    Route::post('/update/student/profile', [StudentProfileController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/program/view/{id}', [StudentApplyController::class, 'viewProgram'])->name('program.view');
    Route::get('/program/apply/view/{id}', [StudentApplyController::class, 'applyView'])->name('program.apply.view');

    Route::get('send-mail', [MailController::class, 'index']);
});

require __DIR__.'/auth.php';
