<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
//use App\Http\Controllers\GeolocalisationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuiviDemandeController;
use App\Http\Controllers\SalleController;
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

Auth::routes();


// Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');
// Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('site');
Route::get('/error-site', [App\Http\Controllers\Admin\HomeController::class, 'error'])->name('error-site');



Route::get('user-pagination', function () {
    return view('default');
});




Route::get('user-pagination', function () {
    return view('default');
});

Route::get('dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('admin', [App\Http\Controllers\Admin\HomeController::class, 'update'])->name('admin/home');


// -----------------------------login Admin-----------------------------------------
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('authentificate');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ------------------------------register---------------------------------------
//Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');


// ----

Route::get('list-admin', [App\Http\Controllers\Auth\RegisterController::class, 'listAdmin'])->name('list-admin');


// -----------------------------forget password ------------------------------
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// -----------------------------reset password ------------------------------
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// // -----------------------------form-----------------------------------------
Route::get('admin/form/new', [App\Http\Controllers\FormController::class, 'index'])->name('admin/form/new');
Route::post('admin/form/save', [App\Http\Controllers\FormController::class, 'save'])->name('admin/form/save');
Route::get('admin/form/view/report', [App\Http\Controllers\FormController::class, 'viewReport'])->name('admin/form/view/report');
Route::get('admin/form/view/update/{id}', [App\Http\Controllers\FormController::class, 'viewUpdate']);
Route::get('admin/form/delete/{id}', [App\Http\Controllers\FormController::class, 'delete']);

// -----------------------------user management-----------------------------------------
/*Route::get('role/user/view', [App\Http\Controllers\UserManagementController::class, 'index'])->name('role/user/view');
Route::post('role/user/save', [App\Http\Controllers\UserManagementController::class, 'save'])->name('role/user/save');
Route::post('role/user/update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('role/user/update');
Route::get('role/user/view/report', [App\Http\Controllers\UserManagementController::class, 'viewReport'])->name('role/user/view/report');
Route::get('role/delete/{id}', [App\Http\Controllers\UserManagementController::class, 'delete']);*/

// ------------------------------admin register---------------------------------------
// Route::get('admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'registerAdmin'])->name('admin/register');
// Route::get('admin/users', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'index'])->name('admin/users');
// Route::post('admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'storeAdmin'])->name('admin/register');
// Route::get('admin/user/update/{id}', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'update']);
// Route::post('admin/user/edit', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'edit'])->name('admin/user/edit'); //Enregistrer departement
// Route::get('admin/user/delete/{id}', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'delete']);


Route::get('/getMontant', [App\Http\Controllers\PieceController::class, 'getMontant']); // Liste departement

//Important -----------------------------Salles-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('salle/new', [App\Http\Controllers\SalleController::class, 'create'])->name('salle/new'); // Liste departement
Route::get('salles', [App\Http\Controllers\SalleController::class, 'index'])->name('salles'); // Liste departement
Route::post('admin/salle/save', [App\Http\Controllers\SalleController::class, 'save'])->name('salle/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/salle/update/{id}', [App\Http\Controllers\SalleController::class, 'update']); //Modifier departement
Route::post('salle/edit', [App\Http\Controllers\SalleController::class, 'edit'])->name('salle/edit'); //Enregistrer departement
Route::get('admin/salle/delete/{id}', [App\Http\Controllers\SalleController::class, 'delete']);


//Important -----------------------------Programmations-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('programmation/new', [App\Http\Controllers\ProgrammationController::class, 'create'])->name('programmation/new'); // Liste departement
Route::get('prorammation', [App\Http\Controllers\ProgrammationController::class, 'index'])->name('prorammation'); // Liste departement
Route::post('admin/programmation/save', [App\Http\Controllers\ProgrammationController::class, 'save'])->name('programmation/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/prorammation/update/{id}', [App\Http\Controllers\ProgrammationController::class, 'update']); //Modifier departement
Route::post('programmation/edit', [App\Http\Controllers\ProgrammationController::class, 'edit'])->name('programmation/edit'); //Enregistrer departement
Route::get('admin/programmation/delete/{id}', [App\Http\Controllers\ProgrammationController::class, 'delete']);


Route::group(['middleware' => ['role:admin,super_admin']], function () {

// ------------------------------Admin users ---------------------------------------
Route::get('admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin/register');
Route::post('admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeAdmin'])->name('admin/register');
Route::get('admin/user/update/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'update']);
Route::post('admin/user/edit', [App\Http\Controllers\Auth\RegisterController::class, 'edit'])->name('admin/user/edit'); //Enregistrer departement
Route::get('admin/user/delete/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'delete']);
Route::get('admin/users', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('admin/users');

//Important -----------------------------profils-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('profil/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profil/new'); // Liste departement
Route::get('profils', [App\Http\Controllers\ProfilController::class, 'index'])->name('profils'); // Liste departement
Route::post('admin/profils/save', [App\Http\Controllers\ProfilController::class, 'save'])->name('profils/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/profils/update/{id}', [App\Http\Controllers\ProfilController::class, 'update']); //Modifier departement
Route::post('profils/edit', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profils/edit'); //Enregistrer departement
Route::get('admin/profils/delete/{id}', [App\Http\Controllers\ProfilController::class, 'delete']);

//Important -----------------------------Typespieces-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('typepiece/new', [App\Http\Controllers\TypepieceController::class, 'create'])->name('typepiece/new'); // Liste departement
Route::get('typepieces', [App\Http\Controllers\TypepieceController::class, 'index'])->name('typepieces'); // Liste departement
Route::post('admin/typepieces/save', [App\Http\Controllers\TypepieceController::class, 'save'])->name('typepieces/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/typepieces/update/{id}', [App\Http\Controllers\TypepieceController::class, 'update']); //Modifier departement
Route::post('typepieces/edit', [App\Http\Controllers\TypepieceController::class, 'edit'])->name('typepieces/edit'); //Enregistrer departement
Route::get('admin/typepieces/delete/{id}', [App\Http\Controllers\TypepieceController::class, 'delete']);


//Important -----------------------------Pieces-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('piece/new', [App\Http\Controllers\PieceController::class, 'create'])->name('piece/new'); // Liste departement
Route::get('piece', [App\Http\Controllers\PieceController::class, 'index'])->name('piece'); // Liste departement
Route::post('admin/piece/save', [App\Http\Controllers\PieceController::class, 'save'])->name('piece/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/piece/update/{id}', [App\Http\Controllers\PieceController::class, 'update']); //Modifier departement
Route::post('piece/edit', [App\Http\Controllers\PieceController::class, 'edit'])->name('piece/edit'); //Enregistrer departement
Route::get('admin/piece/delete/{id}', [App\Http\Controllers\PieceController::class, 'delete']);






//Important -----------------------------Liste des demandes-----------------------------------------
Route::get('liste/demandes', [App\Http\Controllers\DemandeController::class, 'indexAdmin'])->name('demandes/admin'); // Liste departement

//Important -----------------------------Suivi Demande-----------------------------------------
Route::post('suivi/demande', [App\Http\Controllers\SuiviDemandeController::class, 'store'])->name('suivi/demande');
Route::get('suivi/demande/delete/{id}', [App\Http\Controllers\SuiviDemandeController::class, 'destroy']);

});

Route::group(['middleware' => ['role:super_admin,etudiant,enseignant']], function () {
//Important -----------------------------Demandes-----------------------------------------
//Route::get('profils/new', [App\Http\Controllers\ProfilController::class, 'create'])->name('profils/new'); //New departement
Route::get('demande/new', [App\Http\Controllers\DemandeController::class, 'create'])->name('demandes/new'); // Liste departement
Route::get('demandes', [App\Http\Controllers\DemandeController::class, 'index'])->name('demandes'); // Liste departement
Route::post('admin/demandes/save', [App\Http\Controllers\DemandeController::class, 'save'])->name('demandes/save'); //Enregistrer departement
//Route::post('departements/edit', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departements/edit'); //Enregistrer departement
Route::get('admin/demandes/update/{id}', [App\Http\Controllers\DemandeController::class, 'update']); //Modifier departement
Route::post('demandes/edit', [App\Http\Controllers\DemandeController::class, 'edit'])->name('demandes/edit'); //Enregistrer departement
Route::get('admin/demandes/delete/{id}', [App\Http\Controllers\DemandeController::class, 'delete']);
});

Route::group(['middleware' => ['role:super_admin,etudiant,enseignant,admin']], function () {
Route::get('user/update/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'profilUpdate']);
Route::post('user/edit', [App\Http\Controllers\Auth\RegisterController::class, 'profilEdit'])->name('user/edit'); //Enregistrer departement
});


