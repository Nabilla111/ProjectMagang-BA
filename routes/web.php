<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaController;
use App\Http\Controllers\BaGeoController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JenisBaController;
use App\Http\Controllers\JenisDataController;
use App\Http\Controllers\TtdKabidController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\DashboardController;
 
// Route::get('auth/login', function () {
//     return view('');
// });
Route::get('/', [AuthController::class, 'login']);
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerBa')->name('register.ba');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginBa')->name('login.ba');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
    Route::prefix('ba')->group(function () {
        Route::get('', [BaController::class, 'index'])->name('ba');
        Route::get('create', [BaController::class, 'create'])->name('ba.create');
        Route::post('store', [BaController::class, 'store'])->name('ba.store');
        Route::get('show/{id}', [BaController::class, 'show'])->name('ba.show');
        Route::get('cetak/{id}', [BaController::class, 'cetak'])->name('ba.cetak');
        Route::get('edit/{id}', [BaController::class, 'edit'])->name('ba.edit');
        Route::put('edit/{id}', [BaController::class, 'update'])->name('ba.update');
        Route::delete('destroy/{id}', [BaController::class, 'destroy'])->name('ba.destroy');
        Route::get('signature', [BaController::class, 'tandatangan'])->name('ba.signature');
        Route::post('signature', [BaController::class, 'save'])->name('ba.signpad.save');
        Route::get('signatureprodusen', [BaController::class, 'tandatanganprodusen'])->name('ba.signatureprodusen');
        Route::post('signatureprodusen', [BaController::class, 'saveprod'])->name('ba.signpadprod.save');
    });
    
    Route::prefix('bageo')->group(function () {
        Route::get('', [BaGeoController::class, 'index'])->name('bageo');
        Route::get('createStep1', [BaGeoController::class, 'createStep1'])->name('bageo.createStep1');
        Route::post('postStep1', [BaGeoController::class, 'postStep1'])->name('bageo.postStep1');
        Route::get('createStep2', [BaGeoController::class, 'createStep2'])->name('bageo.createStep2');
        Route::post('postStep2', [BaGeoController::class, 'postStep2'])->name('bageo.postStep2');
        Route::get('createStep3', [BaGeoController::class, 'createStep3'])->name('bageo.createStep3');
        Route::post('postStep3', [BaGeoController::class, 'postStep3'])->name('bageo.postStep3');
        Route::get('createStep4', [BaGeoController::class, 'createStep4'])->name('bageo.createStep4');
        Route::post('postStep4', [BaGeoController::class, 'postStep4'])->name('bageo.postStep4');
        Route::get('createStep5', [BaGeoController::class, 'createStep5'])->name('bageo.createStep5');
        Route::post('postStep5', [BaGeoController::class, 'postStep5'])->name('bageo.postStep5');
        Route::get('konfirmasi', [BaGeoController::class, 'konfirmasi'])->name('bageo.konfirmasi');
        Route::post('store', [BaGeoController::class, 'storeBageo'])->name('bageo.storeBageo');
        Route::post('pilihba', [BaGeoController::class, 'pilihba'])->name('bageo.pilihba');
        Route::get('show/{id}', [BaGeoController::class, 'show'])->name('bageo.show');
        Route::get('cetak/{id}', [BaGeoController::class, 'cetak'])->name('bageo.cetak');
        Route::get('edit/{id}', [BaGeoController::class, 'edit'])->name('bageo.edit');
        Route::put('edit/{id}', [BaGeoController::class, 'update'])->name('bageo.update');
        Route::delete('destroy/{id}', [BaGeoController::class, 'destroy'])->name('bageo.destroy');
        Route::get('signature', [BaGeoController::class, 'tandatangan'])->name('bageo.signature');
        Route::post('signature', [BaGeoController::class, 'save'])->name('bageo.signpad.save');
        Route::get('signatureprodusen', [BaGeoController::class, 'tandatanganprodusen'])->name('bageo.signatureprodusen');
        Route::post('signatureprodusen', [BaGeoController::class, 'saveprod'])->name('bageo.signpadprod.save');
        Route::post('/path/to/save/signature', [BaGeoController::class, 'saveSignature'])->name('save.signature');
        Route::post('/save-ttd', [YourController::class, 'saveTtd'])->name('save-ttd');
        Route::post('/save-ttd', [YourController::class, 'saveTtd'])->name('save-ttd');
        Route::get('/bageo/editStep1/{id}', [BaGeoController::class, 'editStep1'])->name('bageo.editStep1');
        Route::post('/bageo/updateStep1/{id}', [BaGeoController::class, 'updateStep1'])->name('bageo.updateStep1');
        Route::get('bageo/{id}/edit', [BaGeoController::class, 'edit'])->name('bageo.edit');
        Route::put('bageo/{id}', [BaGeoController::class, 'update'])->name('bageo.update');
        Route::get('/bageo/editStep1/{id}', [BageoController::class, 'editStep1'])->name('bageo.editStep1');
        Route::put('/bageo/updateStep1/{id}', [BageoController::class, 'updateStep1'])->name('bageo.updateStep1');

        Route::get('/bageo/editStep2/{id}', [BageoController::class, 'editStep2'])->name('bageo.editStep2');
        Route::put('/bageo/updateStep2/{id}', [BageoController::class, 'updateStep2'])->name('bageo.updateStep2');

        Route::get('/bageo/editStep3/{id}', [BageoController::class, 'editStep3'])->name('bageo.editStep3');
        Route::put('/bageo/updateStep3/{id}', [BageoController::class, 'updateStep3'])->name('bageo.updateStep3');

        Route::get('/bageo/editStep4{id}', [BageoController::class, 'editStep4'])->name('bageo.editStep4');
        Route::put('/bageo/updateStep4/{id}', [BageoController::class, 'updateStep4'])->name('bageo.updateStep4');

        Route::get('/bageo/editStep5{id}', [BageoController::class, 'editStep5'])->name('bageo.editStep5');
        Route::put('/bageo/updateStep5/{id}', [BageoController::class, 'updateStep5'])->name('bageo.updateStep5');
       
        Route::get('bageo/konfirmasiEdit/{id}', [BaGeoController::class, 'konfirmasiEdit'])->name('bageo.konfirmasiEdit');
        Route::get('/bageo', [BageoController::class, 'index'])->name('bageo.index');

        Route::get('bageo/{id}/edit-step-1', [BaGeoController::class, 'editStep1'])->name('bageo.editStep1');
        Route::get('bageo/{id}/edit-step-2', [BaGeoController::class, 'editStep2'])->name('bageo.editStep2');
        Route::get('bageo/{id}/edit-step-3', [BaGeoController::class, 'editStep3'])->name('bageo.editStep3');
        Route::get('bageo/{id}/edit-step-4', [BaGeoController::class, 'editStep4'])->name('bageo.editStep4');
        Route::get('bageo/{id}/edit-step-5', [BaGeoController::class, 'editStep5'])->name('bageo.editStep5');
        Route::get('/bageo/editStep2/{id}', [BageoController::class, 'editStep2'])->name('bageo.editStep2');


    });    
        Route::post('/save-ttd', function (Request $request) {
            $request->session()->put('selected_ttd', $request->input('id_ttd')); // Simpan ID tanda tangan di session
            return response()->json(['success' => true]);
        });

    Route::controller(InstansiController::class)->prefix('instansi')->group(function () {
        Route::get('', 'index')->name('instansi');
        Route::get('create', 'create')->name('instansi.create');
        Route::post('store', 'store')->name('instansi.store');
        Route::get('show/{id}', 'show')->name('instansi.show');
        Route::get('edit/{id}', 'edit')->name('instansi.edit');
        Route::put('edit/{id}', 'update')->name('instansi.update');
        Route::delete('destroy/{id}', 'destroy')->name('instansi.destroy');
    });

    Route::controller(TtdKabidController::class)->prefix('ttd')->group(function () {
        Route::get('', 'index')->name('ttd.index');
        Route::get('create', 'create')->name('ttd.create');
        Route::post('store', 'store')->name('ttd.store');
        Route::get('show/{id}', 'show')->name('ttd.show');
        Route::get('edit/{id}', 'edit')->name('ttd.edit');
        Route::put('edit/{id}', 'update')->name('ttd.update');
        Route::delete('destroy/{id}', 'destroy')->name('ttd.destroy');
    });

    Route::controller(JenisBaController::class)->prefix('jenisba')->group(function () {
        Route::get('', 'index')->name('jenisba');
        Route::get('create', 'create')->name('jenisba.create');
        Route::post('store', 'store')->name('jenisba.store');
        Route::get('show/{id}', 'show')->name('jenisba.show');
        Route::get('edit/{id}', 'edit')->name('jenisba.edit');
        Route::put('edit/{id}', 'update')->name('jenisba.update');
        Route::delete('destroy/{id}', 'destroy')->name('jenisba.destroy');
    });

    Route::controller(JenisDataController::class)->prefix('jenisdata')->group(function () {
        Route::get('', 'index')->name('jenisdata');
        Route::get('create', 'create')->name('jenisdata.create');
        Route::post('store', 'store')->name('jenisdata.store');
        Route::get('show/{id}', 'show')->name('jenisdata.show');
        Route::get('edit/{id}', 'edit')->name('jenisdata.edit');
        Route::put('edit/{id}', 'update')->name('jenisdata.update');
        Route::delete('destroy/{id}', 'destroy')->name('jenisdata.destroy');
    });

    Route::controller(RekapBageospasialController::class)->prefix('rekapbageospasial')->group(function () {
        Route::get('', 'index')->name('rekapbageospasial');
        Route::get('show/{id}', 'show')->name('rekapbageospasial.show');
    });

    Route::prefix('rekapbastatistik')->group(function () {
        Route::get('', [RekapBastatistikController::class, 'index'])->name('rekapbastatistik');
        Route::get('show/{id}', [RekapBastatistikController::class, 'show'])->name('rekapbastatistik.show');
    });
    
    
 
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    //tandatangan
    //Route::get('/signature', [SignatureController::class, 'index']);
    //Route::post('/signature', [SignatureController::class, 'save'])->name('signpad.save');
});