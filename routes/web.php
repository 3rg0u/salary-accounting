<?php

use App\Http\Controllers\admin\DegreeController;
use App\Http\Controllers\admin\FalcultyController;
use App\Http\Controllers\admin\ProfessorController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\auth\AuthenticateController;
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
    });
});



