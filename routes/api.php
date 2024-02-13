<?php

use App\Http\Controllers\Api\PublicApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('document', [PublicApiController::class, 'document'])->name('public-api.document');
Route::get('document/{document}', [PublicApiController::class, 'documentShow'])->name('public-api.document.show');
Route::get('fiscalYear', [PublicApiController::class, 'fiscalYear'])->name('public-api.fiscal-year');
