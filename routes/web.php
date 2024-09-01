<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
   switch (auth()->user()->user_type) {
    case 'admin':
        return redirect()->route('admin.dashboard');
    case 'program_chair':
        return redirect()->route('program_chair.dashboard');
    case 'staff':
        // return redirect()->route('admin.dashboard');
    default:
        # code...
        break;
   }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/staff', function () {
        return view('admin.staff');
    })->name('admin.staff');
    Route::get('/program-chair', function () {
        return view('admin.program-chair');
    })->name('admin.program-chair');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('admin.category');
});

Route::prefix('program_chair')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('program_chair.dashboard');
    })->name('program_chair.dashboard');
    Route::get('/incoming', function () {
        return view('program_chair.incoming');
    })->name('program_chair.incoming');
    Route::get('/compose', function () {
        return view('program_chair.compose');
    })->name('program_chair.compose');
    Route::get('/outgoing', function () {
        return view('program_chair.outgoing');
    })->name('program_chair.outgoing');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
