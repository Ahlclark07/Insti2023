<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\TestRunner\GarbageCollectionTriggered;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfController::class, 'edit'])->name("admin");
Route::get('/profil', function () {
})->middleware('auth');

Route::get('/dashboard/ajouter-etudiants', [AdminController::class, 'createEtudiants'])->name("admin.ajoutetudiants");
Route::get('/dashboard/ajouter-professeurs', [AdminController::class, 'createprofesseurs'])->name("admin.ajoutprofesseurs");
Route::get('/dashboard/ajouter-etudiant', [AdminController::class, 'createEtudiant'])->name("admin.ajoutetudiant");
Route::get('/dashboard/ajouter-professeur', [AdminController::class, 'createProfesseur'])->name("admin.ajoutprofesseur");
Route::post('/dashboard/sauver-compte', [AdminController::class, 'store'])->name("admin.savecompte");
Route::post('/dashboard/sauver-comptes', [AdminController::class, 'storeWithFile'])->name("admin.savecomptes");

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
