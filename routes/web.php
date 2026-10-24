


<?php
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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('/student');
});

Route::get('/student', [StudentController::class, 'index']);

Route::get('/student/create', [StudentController::class, 'create']);

Route::post('/student', [StudentController::class, 'store']);

Route::get('/student/{id}/edit', [StudentController::class, 'edit']);

Route::put('/student/{id}', [StudentController::class, 'update']);

Route::delete('/student/{id}', [StudentController::class, 'destroy']);