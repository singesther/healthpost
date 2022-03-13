<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ HealthController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\PaymentsController;
use App\http\controller\UserController;
use App\Http\Controllers\healthpostController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\InstallmentsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/', [CustomAuthController::class, 'index'])->name('login');

Route::resource('member', MemberController::class);
Route::resource('membership', MembershipController::class);
Route::resource('installments', InstallmentsController::class);
Route::resource('health', HealthController::class);


Route::resource('healthpost', healthpostController::class);


Route::get('/status/update', 'MemberController@updateStatus')->name('member.update.status');

Route::resource('plan', PlansController::class);
Route::resource('payments', PaymentsController::class);

Route::post('api/fetch-members', [PaymentsController::class, 'fetchMember']);

Route::post('api/fetch-healths', [PaymentsController::class, 'fetchHealth']);

Route::post('/healthpost_red/{healthpost_id}', [InstallmentsController::class, 'healthpost'])->name('red_health');

Route::post('/insert_installment/{membership_id}', [InstallmentsController::class, 'insert_new'])->name('insert_new_inst');

Route::get('/installments_index', [InstallmentsController::class, 'index'])->name('installments_index');

Route::post('/health_create/{id}', [HealthController::class, 'health_create'])->name('health_create');

Route::post('/existing_hc/{owner_id}', [HealthController::class, 'existing_hc'])->name('existing_hc');

Route::post('/mem_create', [MembershipController::class, 'mem_create'])->name('mem_create');

Route::post('/dates_create/{nof_insts}', function(){
    $no = $nof_insts;
    return view('membership.inst', ['nof_insts' => $no]);
});

Auth::routes();


