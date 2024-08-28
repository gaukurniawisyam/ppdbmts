<?php

// use HomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\Admin\PpdbTanggalUjianController;




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
    return view('index');
});

Route::post('/upload_kk', [FileController::class, 'uploadKK'])->name('upload_kk');
Route::post('/upload_ktp', [FileController::class, 'uploadKTP'])->name('upload_ktp');
Route::post('/upload_ijazah', [FileController::class, 'uploadIjazah'])->name('upload_ijazah');
Route::delete('/delete/kk/{id}', [FileController::class, 'deleteKk'])->name('delete_kk');
Route::delete('/delete/ktp/{id}', [FileController::class, 'deleteKtp'])->name('delete_ktp');
Route::delete('/delete/ijazah/{id}', [FileController::class, 'deleteIjazah'])->name('delete_ijazah');
Route::get('/foto/{filename}', [FileController::class, 'viewFile'])->name('view_file');
Route::get('/foto/{filename}', [FileController::class, 'viewFile'])->name('view_file');
// routes/web.php
Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
Route::get('/participant/{id}', [ParticipantController::class, 'showParticipantData']);
Route::post('/update-status', [PendaftaranController::class, 'updateStatus']);

// surat
Route::get('/surat', [SuratController::class, 'showSurat']);
Route::get('/surat/download-pdf', [SuratController::class, 'downloadPDF']);
// kartu
Route::get('/kartu', [KartuController::class, 'showKartu']);
Route::get('/kartu/kartu-ujian', [KartuController::class, 'downloadPDF']);

// routes/web.php

// Route to display the page (GET request)
Route::get('riwayat', [Controller::class, 'show'])->name('riwayat.show');

// Route to handle the form submission (POST request)
Route::post('riwayat/{idpendaftaran}', [Controller::class, 'updateStatus'])->name('riwayat.update');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('ppdbdaftar', 'ppdbdaftar');
    Route::get('tentang', 'tentang');
    Route::get('login', 'login');
    Route::get('logout', 'logout');
    Route::post('logincek', 'logincek');
    Route::get('loginadmin', 'loginadmin');
    Route::post('loginadmincek', 'loginadmincek');
    Route::get('daftar', 'daftar');
    Route::get('ppdb', 'ppdb');
    Route::get('ppdbdetail/{id}', 'ppdbdetail');
    Route::get('ppdbdaftar/{id}', 'ppdbdaftar');
    Route::post('ppdbdaftarsimpan', 'ppdbdaftarsimpan');
    Route::get('daftar', 'daftar');
    Route::get('daftarulang', 'daftarulang');
    Route::post('/daftarulangsimpan', [HomeController::class, 'daftarUlangSimpan']);
    Route::get('riwayat', 'riwayat');
    Route::get('riwayatdetail/{id}', 'riwayatdetail');

    
    Route::get('riwayatedit/{id}', 'riwayatedit');
    Route::post('daftarsimpan', 'daftarsimpan');
    Route::get('pembayaran/{id}', 'pembayaran');
    Route::post('pembayaransimpan', 'pembayaransimpan');
    Route::post('riwayateditsimpan', 'riwayateditsimpan');
    
    Route::get('tandaterima/{id}', 'tandaterima');
    
    
    Route::get('profil', 'profil');
    Route::post('ubahprofil/{id}', 'ubahprofil');

    });
    Route::post('update_status/{id}', [Controller::class, 'updateStatus'])->name('update_status');
    

    Route::get('/send-feedback', [FeedbackController::class, 'create'])->name('send_feedback_form');
    Route::post('/send-feedback', [FeedbackController::class, 'store'])->name('send_feedback');
    

    Route::controller(AdminController::class)->group(function () {
    Route::post('/getadminname', [AdminController::class, 'getAdminName']);
    Route::get('/admin/send-notification', 'NotificationController@create')->name('notification.create');
    Route::post('/admin/send-notification', 'NotificationController@send')->name('notification.send');
    Route::post('/admin/send-notification', [AdminController::class, 'sendNotification'])->name('admin.sendNotification');
    Route::get('admin/participant/{id}', [ParticipantController::class, 'showParticipantData'])->name('admin.participant.show');
    Route::get('admin', 'dashboard');
    Route::get('admin/logout', 'logout');

    Route::get('admin/dashboard', 'dashboard');
    Route::get('admin/ppdbdaftar', 'ppdbdaftar');
    Route::get('admin/ppdbtambah', 'ppdbtambah');
    Route::post('admin/ppdbtambahsimpan', 'ppdbtambahsimpan');
    Route::get('admin/ppdbedit/{id}', 'ppdbedit');
    Route::post('admin/ppdbeditsimpan/{id}', 'ppdbeditsimpan');
    Route::get('admin/ppdbhapus/{id}', 'ppdbhapus');

    Route::get('admin/ppdbpeserta/{id}', 'ppdbpeserta');
    Route::get('admin/ppdbpesertadetail/{id}', 'ppdbpesertadetail');
    Route::post('admin/ppdbpesertasimpan/{id}', 'ppdbpesertasimpan');

    Route::get('admin/tanggalujian', [AdminController::class, 'tanggalUjian'])->name('tanggalUjian');
    Route::post('admin/save-tanggalujian', [AdminController::class, 'saveTanggalUjian'])->name('saveTanggalUjian');
    Route::delete('admin/delete-tanggalujian', [AdminController::class, 'deleteTanggalUjian'])->name('deleteTanggalUjian');
    

    Route::get('/admin/admindaftarulang', [AdminController::class, 'admindaftarulang']);
    Route::get('/admin/admindaftarulangedit');
    
    
    Route::get('admin/userdaftar', 'userdaftar');
    Route::get('admin/usertambah', 'usertambah');
    Route::post('admin/usertambahsimpan', 'usertambahsimpan');
    Route::get('admin/useredit/{id}', 'useredit');
    Route::post('admin/usereditsimpan/{id}', 'usereditsimpan');
    Route::get('admin/userhapus/{id}', 'userhapus');

    Route::get('admin/admindaftar', 'admindaftar');
    Route::get('admin/admintambah', 'admintambah');
    Route::post('admin/ppdbtambahsimpan', [AdminController::class, 'ppdbtambahsimpan']);
    Route::get('admin/adminedit/{id}', 'adminedit');
    Route::post('admin/admineditsimpan/{id}', 'admineditsimpan');
    Route::get('admin/adminhapus/{id}', 'adminhapus');

});