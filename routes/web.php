<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\FinancialLoansController;
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


Route::get('/', [FinancialLoansController::class, 'index']);
Route::get('home', [FinancialLoansController::class, 'index']);
Route::get('add_payment', [PaymentsController::class, 'index']);
Route::get('search_in_loans', [FinancialLoansController::class, 'searchInLoans']);
Route::post('create_new_loan', [FinancialLoansController::class, 'create']);
Route::post('search_in_loans', [PaymentsController::class, 'search']);
Route::post('make_payment', [PaymentsController::class, 'makePayment']);
Route::post('loans_deatils', [FinancialLoansController::class, 'LoansDeatils']);