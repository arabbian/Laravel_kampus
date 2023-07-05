<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PeminjamanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route :: get('/getmahasiswa',[MahasiswaController::class,'getmahasiswa']);
Route :: get('/getid/{id}',[MahasiswaController::class,'getid']);
Route :: post('/tambahmahasiswa',[MahasiswaController::class,'tambahmahasiswa']);
Route :: put('/updatemahasiswa/{id}',[MahasiswaController::class, 'updatemahasiswa']);
Route :: delete('/deletemahasiswa/{id}',[MahasiswaController::class, 'deletemahasiswa']);
Route :: patch('/updatemahasiswa/{id}',[MahasiswaController::class, 'updatemahasiswa']);

Route :: get('/getbuku',[BukuController::class,'getbuku']);
Route :: get('/getbuku/{id}',[BukuController::class,'getbuku']);
Route :: post('/tambahbuku',[BukuController::class,'tambahbuku']);
Route :: put('/updatebuku/{id}',[BukuController::class, 'updatebuku']);
Route :: delete('/deletebuku/{id}',[BukuController::class, 'deletebuku']);

Route :: get('/getjurusan',[JurusanController::class,'getjurusan']);
Route :: get('/getjurusan/{id}',[JurusanController::class,'getjurusan']);
Route :: post('/tambahjurusan',[JurusanController::class,'tambahjurusan']);
Route :: put('/updatejurusan/{id}',[JurusanController::class,'updatejurusan']);
Route :: delete('/deletejurusan/{id}',[JurusanController::class,'deletejurusan']);

Route :: get('/getpeminjaman/{id}',[PeminjamanController::class,'getpeminjaman']);
Route :: post('/createpeminjaman',[PeminjamanController::class,'createpeminjaman']);
Route :: put('/ubahpeminjaman/{id}',[PeminjamanController::class,'ubahpeminjaman']);
Route :: delete('/hapuspeminjaman/{id}',[PeminjamanController::class,'hapuspeminjaman']);
Route :: put('/pengembalian/{id}',[PeminjamanController::class,'pengembalian']);

