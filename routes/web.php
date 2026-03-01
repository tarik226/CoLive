<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\SettlementController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () { return view('auth.views.login'); })->name('loginview');
Route::get('/register', function () { return view('auth.views.register'); })->name('registerview');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/index', function () { return view('index'); })->name('index');

Route::get('/expense.index', function () { return view('expenses.index'); })->name('expense.index');


Route::get('/dashbord', [DashboardController::class,'inedxx'])->name('dashboard');

Route::get('/Collocationcreate', function () { return view('spaces.create'); })->name('Collocation.create');

// Route::get('/Housemate.view', function () { return view('housemates.index'); })->name('Housemate.view');

Route::get('/admindashbord', [DashboardController::class,'index'])->name('admin.dashboard')->middleware(AdminMiddleware::class);

Route::post('/profile', [DashboardController::class,'profile'])->name('profile');

Route::controller(ColocationController::class)->group(function () {
    Route::get('/colocations', 'index' )->name('colocations.index');
    Route::get('/colocations/create', 'create')->name('colocations.create');
    Route::post('/colocations', 'store')->name('colocations.store');
    Route::get('/colocations/{id}', 'show')->name('colocations.show');
    Route::put('/colocations/{id}', 'update')->name('colocations.update');
    Route::delete('/colocations/{id}', 'destroy')->name('colocations.destroy');
    Route::get('/houseenroll','enroll')->name('enroll.view');
    Route::post('/houseenroll','enrolllogique')->name('enroll');
    Route::get('/kick/{id}','kick')->name('kick');
    Route::delete('/quitter','quitter')->name('colocations.quitter');
})->middleware(ClientMiddleware::class);

Route::controller(CategorieController::class)->group(function () {
    Route::get('/categories', 'index' )->name('categories.index');       // List all categories
    Route::post('/categories', 'store')->name('categories.store');      // Add new category
    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy'); // Delete category
})->middleware(ClientMiddleware::class);


Route::controller(DepenseController::class)->group(function () {
    Route::get('/depenses', 'index')->name('depenses.index');             // List all depenses
    Route::get('/depenses/{id}', 'show')->name('depenses.show');          // Show single depense
    Route::post('/depenses', 'store')->name('depenses.store');            // Add new depense
    Route::put('/depenses/{id}', 'update')->name('depenses.update');      // Update depense
    Route::delete('/depenses/{id}', 'destroy')->name('depenses.destroy'); // Delete depense
})->middleware(ClientMiddleware::class);

Route::get('part/{id}',[SettlementController::class,'regler'])->name('part');

Route::get('ban/{id}',[AuthController::class,'ban'])->name('ban');







