<?php

use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', LoginController::class)->name('home');
Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('inventories', InventoryController::class);
Route::resource('users', UserController::class)->except('show');
Route::resource('clients', ClientController::class)->except('show');
Route::resource('companies', CompanyController::class)->except('show');
Route::resource('branches', BranchesController::class)->except('show');
Route::resource('projects', ProjectController::class)->except('show');
Route::resource('services', ServiceController::class)->except('show');


