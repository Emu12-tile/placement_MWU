<?php

use App\Models\Prestwo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\Choice2Controller;
use App\Http\Controllers\JobCat2Controller;
use App\Http\Controllers\PrestwoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SecondhrController;
use App\Http\Controllers\MultiformController;
use App\Http\Controllers\CreateFormController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\LowPositionController;
use App\Http\Controllers\PresidentialController;
use App\Http\Controllers\EducationTypeController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FormController::class, 'create'])->name('try');
Route::post('/', [FormController::class, 'store'])->name('add.form');

// Route::get('/hr/try/job', [FormController::class, 'position']);
// Route::get('/hr/try/categ2', [FormController::class, 'position2']);
// Route::get('/hr/try/selection', [FormController::class, 'selection']);
// Route::get('/hr/try/selection2', [FormController::class, 'selection2']);






Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware([
    'auth:sanctum',
    'verified',
    'role:user',
])->group(function () {
    Route::get('/user', [RegisteredUserController::class, 'index'])->name('index');
    Route::post('/user/change_status', [RegisteredUserController::class, 'changeStatus'])->name("change_status");

    Route::post('/user', [RegisteredUserController::class, 'store']);
    Route::get('delete-user/{id}', [RegisteredUserController::class, 'destroy']);


    Route::resource('/educationlevel', EducationLevelController::class);
    Route::resource('/level', LevelController::class);

    Route::post('/level', [LevelController::class, 'store']);

    Route::resource('/educationtype', EducationTypeController::class);

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category-add', [CategoryController::class, 'create']);
    Route::post('store_category', [CategoryController::class, 'store']);

    Route::get('edit_category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::post('chan_status', [CategoryController::class, 'chanStatus'])->name("chan_status");

    Route::post('/educationtype', [EducationTypeController::class, 'store']);
    Route::resource('/position', PositionController::class);
    Route::resource('/choice2', Choice2Controller::class);

    Route::resource('/jobcategory', JobCategoryController::class);
    Route::resource('/jobcat2', JobCat2Controller::class);
    Route::get('/resource/retunApplicant/{id}', [FormController::class, 'returnApplicant'])->name('returnApplicant');
});
Route::middleware([
    'auth:sanctum',
    'verified',
    'role:staff',
])->group(
    function () {
        Route::post('/', [CreateFormController::class, 'store'])->name('add.form');
        Route::resource('/createform', CreateFormController::class);
        // Route::get('/hr/try/job', [FormController::class, 'position']);
        // Route::get('/hr/try/categ2', [FormController::class, 'position2']);
        // Route::get('/hr/try/selection', [FormController::class, 'selection']);
        // Route::get('/hr/try/selection2', [FormController::class, 'selection2']);

        // Route::get('/hr',[FormController::class, 'createforms'] )->name('hr.index');
        // Route::post('/hr/form', [FormController::class, 'store'])->name('add.form');
        Route::get('/step-one', [MultiformController::class, 'createStepOne'])->name('multiforms.create-step-one');
        Route::post('/step-one', [MultiformController::class, 'postCreateStepOne'])->name('multiforms.create.step.one.post');

        Route::get('/step-two', [MultiformController::class, 'createStepTwo'])->name('multiforms.create.step.two');
        Route::post('/steptwo',  [MultiformController::class, 'postCreateStepTwo'])->name('multiforms.create.step.two.post');
        Route::get('/step-three', [MultiformController::class, 'createStepThree'])->name('multiforms.create.step.three');

        Route::post('/stepthree', [MultiformController::class, 'postCreateStepThree'])->name('multiforms.create.step.three.post');
    }
);
Route::middleware([
    'auth:sanctum',
    'verified',
    'role:hr|admin|president|user',

])->group(
    function () {

        Route::resource('/hr', FormController::class);
        // Route::get('/hr',[FormController::class, 'createforms'] )->name('hr.index');
        // Route::post('/hr/form', [FormController::class, 'store'])->name('add.form');
        Route::get('/hr/try/job', [FormController::class, 'position']);
        Route::get('/hr/try/categ2', [FormController::class, 'position2']);
        Route::get('/hr/try/selection', [FormController::class, 'selection']);
        Route::get('/hr/try/selection2', [FormController::class, 'selection2']);

        Route::put('/addposition/{id}', [FormController::class, 'updateform'])->name('addposition');
        Route::get('/forms', [FormController::class, 'form'])->name('forms');
        Route::get('/forms/edit/{id}', [FormController::class, 'formedit']);
        Route::put('/update_education/{id}', [FormController::class, 'updateForms']);
        Route::get('/pos', [FormController::class, 'pos']);
        Route::get('/posDetail/{id}', [FormController::class, 'posDetail'])->name('posDetail');

        Route::resource('/secondhr', SecondhrController::class);
    }
);
Route::middleware([
    'auth:sanctum',
    'verified',
    'role:hr',
])->group(function () {
    Route::resource('/resource', ResourceController::class);
    Route::get('/resource/add/{id}', [ResourceController::class, 'createhr'])->name('addHr');
    Route::get('/resource/edit/{id}', [ResourceController::class, 'edit']);
    Route::put('update-resource/{id}', [ResourceController::class, 'update1']);
    Route::put('update-lowresource/{id}', [ResourceController::class, 'update2']);
    // Route::post('update-lowresource', [ResourceController::class, 'changeStatus'])->name("change_status");
    Route::get('pdf/', [ResourceController::class, 'pdf']);


    Route::get('/choicelow', [SecondhrController::class, 'choicelow']);
    Route::get('/choiceDetaillow/{id}', [SecondhrController::class, 'choiceDetaillow'])->name('choiceDetaillow');
    Route::get('/lowresource', [ResourceController::class, 'index2'])->name('lowresource.lowresource');

    Route::get('/positionresult', [ResourceController::class, 'poslow']);
    Route::get('/positionDetail/{id}', [ResourceController::class, 'positionDetail'])->name('positionDetail');

    Route::get('/result', [ResourceController::class, 'index3'])->name('lowresource.index');
    Route::post('/resource/add/{id}', [ResourceController::class, 'storeRestore'])->name('addHrPost');

    Route::get('/resultsecond', [SecondhrController::class, 'index3'])->name('secondchoicelow.index');
    Route::get('/secondhr/edit/{id}', [SecondhrController::class, 'edit']);
    Route::put('update-secondhr/{id}', [SecondhrController::class, 'update1']);
    Route::put('update-lowsecondhr/{id}', [SecondhrController::class, 'update2']);
    Route::get('/secondhr/add/{id}', [SecondhrController::class, 'createhr1'])->name('addsecond');
    Route::post('/secondhr/add/{id}', [SecondhrController::class, 'storeRestore1'])->name('addHrPost1');

    Route::get('/secondlow', [SecondhrController::class, 'index2'])->name('secondchoice.lowresource');
});





Route::middleware([
    'auth:sanctum',
    'verified',
    'role:hr|president',

])->group(
    function () {
        Route::resource('/list', AdminController::class);
        Route::get('get_ajax_data', [AdminController::class, 'get_ajax_data']);

        Route::get('/pos2', [FormController::class, 'pos2'])->name('pos2');
        Route::get('/posall', [AdminController::class, 'posall'])->name('posall');
        Route::get('/detailall/{id}', [AdminController::class, 'detailall'])->name('detailall');
        Route::get('/posDetail2/{id}', [FormController::class, 'posDetail2'])->name('posDetail2');
        Route::get('/positionhigh', [ResourceController::class, 'poshigh']);
        Route::get('/positionDetailhigh/{id}', [ResourceController::class, 'posDetailhigh'])->name('posDetailhigh');


        Route::get('/choicesecond', [SecondhrController::class, 'postwo']);
        Route::get('/posDetailtwo/{id}', [SecondhrController::class, 'posDetailtwo'])->name('posDetailtwo');






        // Route::get('/result-choice1', [ResourceController::class, 'index4']);


        Route::get('/resulttwo', [SecondhrController::class, 'index4']);
    }

);



// Route::get("search", [FormController::class, 'search']);
// Route::get('/table', [FormController::class, 'table']);

Route::get('/export_pdf/{id}', [MultiformController::class, 'export_pdf'])->name('export_pdf');

// Route::get('/export_pdf/{id}', [FormController::class, 'generatePdf'])->name('export_pdf');
Route::get('/submitted/{id}', [MultiformController::class, 'submit'])->name('submit');

Route::middleware([
    'auth:sanctum',
    'verified',
    'role:president',

])->group(
    function () {
        Route::get('/evaluation/add/{id}', [PresidentialController::class, 'createpresident'])->name('addpresident');
        Route::get('/evaluation/add/{id}', [PresidentialController::class, 'createpresident'])->name('addpresident');
        Route::post('/evaluation/add/{id}', [PresidentialController::class, 'storeRestore'])->name('addPresidentPost');

        Route::get('/evaluationtwo/add/{id}', [PrestwoController::class, 'createpresident'])->name('addpresidenttwo');
        Route::post('/evaluationtwo/add/{id}', [PrestwoController::class, 'storeRestore'])->name('addPresidentPosttwo');

        Route::resource('/evaluation', PresidentialController::class);
        // Route::get('/result1', [PresidentialController::class, 'index2']);
        Route::get('/positionpres', [PresidentialController::class, 'pos'])->name('positionpres');
        Route::get('/posDetailpres/{id}', [PresidentialController::class, 'posDetailpres'])->name('posDetailpres');

        Route::put('update-evaluation/{id}', [PresidentialController::class, 'update1']);
        Route::put('update-choice2evaluation/{id}', [PrestwoController::class, 'update1']);

        Route::get('/allresult', [PresidentialController::class, 'all'])->name('presidential.bothresult');
        Route::resource('/choice2evaluation', PrestwoController::class);
        Route::get('/positionpres2', [PrestwoController::class, 'pos'])->name('positionpres2');
        Route::get('/result2/{id}', [PrestwoController::class, 'posDetailpres'])->name('result2');
    }
);







require __DIR__ . '/auth.php';
