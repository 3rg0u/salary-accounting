<?php

use App\Http\Controllers\admin\AcademicYearController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CourseOfferingController;
use App\Http\Controllers\admin\DegreeController;
use App\Http\Controllers\admin\FalcultyController;
use App\Http\Controllers\admin\ProfessorController;
use App\Http\Controllers\admin\SemesterController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\auth\AuthenticateController;
use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Falculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('signin');
});
Route::get('/signin', [AuthenticateController::class, 'showFormSignIn'])->name('signin');

Route::post('/signin', [AuthenticateController::class, 'handleSignIn'])->name('signin');



Route::get('/reg', function () {
    return view('reg');
});
Route::post('/reg', function (Request $request) {
    $valid = $request->validate(
        [
            'email' => 'unique:users|email',
        ]
    );
    $account = User::create(
        [
            'email' => $valid['email'],
            'password' => Hash::make($request['pw']),
            'role' => $request['role']
        ]
    );


    dd($account);
})->name('reg');



Route::middleware(['auth', 'admin.assert'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.falculty.index');
        });

        // falculties mng
        Route::prefix('/falculties')->group(function () {
            Route::get('/', [FalcultyController::class, 'index'])->name('admin.falculty.index');

            Route::get('/create', [FalcultyController::class, 'create'])->name('admin.falculty.create');

            Route::post('/create', [FalcultyController::class, 'store'])->name('admin.falculty.create');

            Route::put('/edit/{id}', [FalcultyController::class, 'update'])->name('admin.falculty.edit');
            Route::delete('/delete/{id}', [FalcultyController::class, 'destroy'])->name('admin.falculty.delete');

        });

        //degree section
        Route::prefix('/degrees')->group(function () {
            Route::get('/', [DegreeController::class, 'index'])->name('admin.degree.index');

            Route::get('/create', [DegreeController::class, 'create'])->name('admin.degree.create');

            Route::post('/create', [DegreeController::class, 'store'])->name('admin.degree.create');

            Route::put('/edit/{id}', [DegreeController::class, 'update'])->name('admin.degree.edit');
            Route::delete('/delete/{id}', [DegreeController::class, 'destroy'])->name('admin.degree.delete');

        });



        //professor section
        Route::prefix('/professors')->group(function () {
            Route::get('/', [ProfessorController::class, 'index'])->name('admin.professor.index');
            Route::get('/create', [ProfessorController::class, 'create'])->name('admin.professor.create');
            Route::post('/create', [ProfessorController::class, 'store'])->name('admin.professor.create');

            Route::put('/edit/{id}', [ProfessorController::class, 'updateInfor'])->name('admin.professor.edit');
            Route::put('/pw-edit/{id}', [ProfessorController::class, 'updatePassword'])->name('admin.professor.pw-edit');
            Route::delete('/delete/{id}', [ProfessorController::class, 'destroy'])->name('admin.professor.delete');

        });


        // statistic
        Route::prefix('/stats')->group(function () {
            Route::get('/', [StatisticController::class, 'index'])->name('admin.stats.index');
            Route::get('/show/{id}', [StatisticController::class, 'show'])->name(name: 'admin.stats.show');
        });

        // academic affair section
        Route::prefix('/affairs')->group(function () {
            Route::get('/', [AcademicYearController::class, 'index'])->name('admin.affairs.index');
            Route::get('/create', [AcademicYearController::class, 'create'])->name('admin.affairs.create');
            Route::post('/create', [AcademicYearController::class, 'store'])->name('admin.affairs.create');
            Route::get('/show/{code}', [AcademicYearController::class, 'show'])->name('admin.affairs.show');
            Route::post('/semesters/create/{year}', [SemesterController::class, 'store'])->name('admin.affairs.semester.create');
        });


        // courses management
        Route::prefix('/courses')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('admin.courses.index');
            Route::get('/show/{falculty}', [CourseController::class, 'show'])->name('admin.courses.show');
            Route::post('/create/{falculty}', [CourseController::class, 'store'])->name('admin.courses.create');
            Route::put('/update/{code}', [CourseController::class, 'update'])->name('admin.courses.update');
            Route::delete('/delete/{code}', [CourseController::class, 'destroy'])->name('admin.courses.delete');
        });


        Route::prefix('/classes')->group(function () {
            Route::get('/', [CourseOfferingController::class, 'index'])->name('admin.classes.index');
            Route::get('/show/{semes}/{falculty}', [CourseOfferingController::class, 'show'])->name('admin.classes.show');
            Route::post('/create/{falculty}', [CourseOfferingController::class, 'store'])->name('admin.classes.create');
            Route::get('/details/{semes}/{course}', [CourseOfferingController::class, 'detail'])->name('admin.classes.detail');
            Route::put('/assign/{class}', [CourseOfferingController::class, 'assign'])->name('admin.classes.assign');
            Route::delete('/close/{class}', [CourseOfferingController::class, 'close'])->name('admin.classes.close');
            Route::delete('/close-all/{course}', [CourseOfferingController::class, 'closeall'])->name('admin.classes.closeall');
        });

    });
});





Route::get('/reg', function () {
    return view('reg');
});


Route::post('/reg', function (Request $request) {
    $valid = $request->validate(
        [
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]
    );

    $valid['password'] = Hash::make($valid['password']);
    User::create($valid);
})->name('reg');



Route::get('/test', function () {
    echo ucwords('đại số tuyến tính');
});
