<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PageController;
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

Route::get('/dashboard', [AdminController::class, 'createEtudiant'])->name("admin");

Route::get('/profil', [ProfilController::class, 'edit'])->middleware('auth');
Route::post('/profil', [ProfilController::class, 'save'])->name('update.profil')->middleware('auth');

Route::get('/edit-research', [ProfilController::class, 'edit'])->name('edit.research')->middleware('auth');
Route::post('/edit-research', [ProfilController::class, 'saveResearch'])->name('save.research')->middleware('auth');
Route::patch('/edit-research', [ProfilController::class, 'updateResearch'])->name('update.research')->middleware('auth');
Route::delete('/edit-research/{id}', [ProfilController::class, 'deleteResearch'])->name('delete.research')->middleware('auth');

Route::get('/edit-distinctions', [ProfilController::class, 'edit'])->name('edit.distinctions')->middleware('auth');
Route::post('/edit-distinctions', [ProfilController::class, 'saveDistinctions'])->name('save.distinctions')->middleware('auth');
Route::patch('/edit-distinctions', [ProfilController::class, 'updateDistinctions'])->name('update.distinctions')->middleware('auth');
Route::delete('/edit-distinctions/{id}', [ProfilController::class, 'deleteDistinctions'])->name('delete.distinctions')->middleware('auth');

Route::get('/edit-publications', [ProfilController::class, 'edit'])->name('edit.publications')->middleware('auth');


Route::get('/professeurs', [PageController::class, 'getProfesseurs'])->name("frontend.professeurs");
Route::get('/professeur/{id}', [PageController::class, 'getProfesseur'])->name("frontend.professeur");

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
