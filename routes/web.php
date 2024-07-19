<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentApplyController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\RequestInfoOrDemoController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\Admin\Settings\Emails\AdminSettingController;
use App\Http\Controllers\ManagePlanController;
use App\Http\Controllers\Recruiter\Settings\Emails\EmailTemplateController;
use App\Http\Controllers\StripeWebhookController;

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
    //return redirect('/dashboard');
    return view('frontend/index');
});

// Route::middleware("auth")->group(function () {

// Subscription
Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
Route::post('checkout', [PlanController::class, 'checkout'])->name('checkout.create');
Route::post('onetimePay', [PlanController::class, 'onetimePay'])->name('onetimePay.create');
Route::get('checkout/success', [PlanController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [PlanController::class, 'cancel'])->name('checkout.cancel');
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('cashier.webhook');

// });

Route::get('/dashboard', function () {
    //    return view('backend/dashboard/dashboard');
    if (auth()->user()->role == 'coach') {
        return redirect('/applies');
    } elseif (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/student/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/request/info', [RequestInfoOrDemoController::class, 'requestForm']);
Route::post('/request/info/submit', [RequestInfoOrDemoController::class, 'sendInfoRequest']);

Route::middleware(['auth'])->group(function () {
    Route::controller(ManagePlanController::class)
        ->prefix('manage-plan')
        ->as('manage-plan.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });
});

Route::middleware(['auth', 'decrypt.id'])->group(function () {
    // admin
    Route::get('/admin/dashboard', [AdminDashboard::class, 'dashboard']);
    Route::resource('recuriter', RecruiterController::class);
    Route::controller(MediaController::class)
        ->prefix('tune_media')
        ->as('medias.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('destroy/{media}', 'destroy')->name('destroy');
            Route::get('show/{media}', 'show')->name('show');
            Route::put('update/{media}', 'update')->name('update');
            Route::get('images-create', 'createImages')->name('images-create');
            Route::post('image-store', 'storeImage')->name('images-store');
            Route::delete('image-destroy/{mediaImage}', 'Imagedestroy')->name('images-destroy');
            Route::get('image-show/{mediaImage}', 'imageShow')->name('images-show');
            Route::post('imageUpdate/{mediaImage}', 'imageUpdate')->name('images-update');
        });

    Route::get('/profile/admin', [AdminProfileController::class, 'profile']);
    Route::post('/profile/update/admin', [AdminProfileController::class, 'update'])->name('profile.update.admin');
    Route::get('/admin/setting/emails', [AdminSettingController::class, 'emailTemplates']);
    Route::get('/admin/setting/emails/{id}', [AdminSettingController::class, 'editEmailTemplate'])->name('admin.email.edit');
    Route::get('/admin/setting/emails/template/show/{id}', [AdminSettingController::class, 'showEmailTemplate'])->name('admin.email.template.show');
    Route::put('/admin/setting/emails/template/update/{id}', [AdminSettingController::class, 'updateEmailTemplate'])->name('admin.email.template.update');
    // request demo
    Route::get('/request/info/view/{id}', [RequestInfoOrDemoController::class, 'viewInfoRequest']);
    Route::get('/request/info/all', [RequestInfoOrDemoController::class, 'allRequests']);
    Route::delete('/request/info/destroy/{id}', [RequestInfoOrDemoController::class, 'destroy']);
    Route::get('/applies/trash', [ApplyController::class, 'trashedApplies']);

    Route::get('/student/profile/details/{id}', [StudentProfileController::class, 'profileDetails']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    // Reports
    Route::post("/report/recruiter", [ReportController::class, "recruiterReport"])->name('report.recruiter');
    Route::post("/report/applications", [ReportController::class, "applicationReport"])->name('report.application');

    Route::resource('program', ProgramController::class);

    Route::resource('email/template', EmailTemplateController::class);

    Route::get("/chat/{id?}", [ChatController::class, "show"])->name('chat');
    Route::get("/chat/delete/{id?}", [ChatController::class, "delete"]);
    Route::get("/chat/new/{id}", [ChatController::class, "getNewMessages"])->name('chat.new');
    Route::post("/chat/store", [ChatController::class, "store"])->name('chat.store');
    Route::get('/notification/messages', [ChatController::class, 'notificationMessages']);

    // coaches
    Route::get('manage-coaches', [CoachController::class, 'manageCoaches'])->name("manage.coach");
    Route::post('store-coach', [CoachController::class, 'storeCoach'])->name('store.coach');
    Route::post('delete-coach', [CoachController::class, 'deleteCoach'])->name('delete.coach');
    Route::get('edit-coach', [CoachController::class, 'editCoach'])->name('edit.coach');
    Route::post('update-coach', [CoachController::class, 'updateCoach'])->name('update.coach');

    // University
    Route::get('manage_university', [UniversityController::class, 'manageUniversity'])->name("manage.university");
    Route::post('store_university', [UniversityController::class, 'storeUniversity'])->name("store.university");
    Route::post('delete_university', [UniversityController::class, 'deleteUniversity'])->name("delete.university");

    Route::get('/applies', [ApplyController::class, 'applies']);
    Route::get('/apply/restore/{id}', [ApplyController::class, 'restoreFromTrash']);
    Route::post('/apply/rating', [ApplyController::class, 'saveApplyRating'])->name('apply.rating');
    Route::get('/apply/status/{id}/{status}', [ApplyController::class, 'changeApplyStatus']);
    Route::delete('/apply/destroy/{id}', [ApplyController::class, 'destroy'])->name('apply.destroy');
    Route::get('/apply/view/{id}', [ApplyController::class, 'viewApply']);
    Route::match(['get', 'post'], '/program/apply/requirement/{apply_id?}', [ApplyController::class, 'requestApplyRequirement'])->name('apply.request.requirement');
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/update/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image');

    // student
    Route::get('/student/dashboard', [StudentApplyController::class, 'programs']);
    Route::get('/program/apply/{id}', [StudentApplyController::class, 'studentApply']);
    Route::get('/program/details/{id}', [ProgramController::class, 'programDetails']);
    Route::post('/program/apply/{id}', [StudentApplyController::class, 'apply'])->name('program.apply');
    Route::get('/student/applies', [StudentApplyController::class, 'applies']);
    Route::get('/profile/student', [StudentProfileController::class, 'profile']);
    Route::get('/student/videos', [StudentProfileController::class, 'videos']);
    Route::match(['get', 'post'], '/setting/update', [StudentProfileController::class, 'updateSetting'])->name('setting.update');
    Route::post('/update/student/profile', [StudentProfileController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/program/view/{id}', [StudentApplyController::class, 'viewProgram'])->name('program.view');
    Route::get('/program/apply/view/{id}', [StudentApplyController::class, 'applyView'])->name('program.apply.view');
    Route::get('/student/apply/requirements/form/{id}', [StudentApplyController::class, 'requirementForm']);
    Route::post('/apply/requirements/submit/', [StudentApplyController::class, 'submitRequirements'])->name('requirements.submit');
    Route::get('/apply/edit/{id}', [StudentApplyController::class, 'editApply'])->name('apply.edit');
    Route::post('/apply/update/{id}', [StudentApplyController::class, 'updateApply'])->name('apply.update');

    Route::get('coaches_list', [CoachController::class, 'coachList'])->name('coach.list');
    Route::get('universities_list', [CoachController::class, 'universitiesList'])->name('universities.list');

    Route::get('/notifications', [NotificationController::class, 'getNotifications']);
    Route::get('/notification/view/{notificationId}', [NotificationController::class, 'viewNotification']);

    Route::get('send-mail', [MailController::class, 'index']);
});

require __DIR__ . '/auth.php';
