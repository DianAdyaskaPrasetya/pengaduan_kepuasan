<?php

use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
//control view
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengaduanController;

Route::group(['middleware' => 'guest'], function() {
    // authentication
    Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
    
    Route::post('/auth/login-basic', [LoginBasic::class, 'dologin'])->name('auth-login-dologin');
    Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
    Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
    Route::get('/logout', [LoginBasic::class, 'logout'])->name('logout');
    });


Route::group(['middleware' => 'auth'], function () {
Route::get('/logout', [LoginBasic::class, 'logout'])->middleware('auth')->name('logout');
// Main Page Route
Route::get('/dashboard',[Analytics::class, 'index'])->middleware('auth')->name('dashboard');

//siswa

Route::get('/siswa/view-data-siswa', [SiswaController::class, 'index'])->name('view-data-siswa');


//pengaduan
Route::get('/pengaduan/view-data-pengaduan', [PengaduanController::class, 'index'])->name('view-data-pengaduan');
Route::get('/pengaduan/tambah-pengaduan', [PengaduanController::class, 'create'])->name('tambah-pengaduan');
Route::post('content.pengaduan.tambah-pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.siswa');
Route::patch('/pengaduan/update-pengaduan/{id}', [PengaduanController::class, 'edit'])->middleware('auth')->name('save_update_pengaduan');
Route::get('/pengaduan/update-pengaduan/{id}', [PengaduanController::class, 'show'])->middleware('auth')->name('update_pengaduan');
Route::get('/pengaduan/view-data-pengaduan/{id}', [PengaduanController::class, 'destroy'])->middleware('auth')->name('delete_pengaduan');
Route::get('/pengaduan/cetak_pengaduan', [PengaduanController::class, 'cetak_pdf'])->name('cetak_pengaduan')->middleware('auth');

//siswa
Route::patch('/siswa/update-siswa/{id}', [SiswaController::class, 'edit'])->middleware('auth')->name('save_update_siswa');
Route::get('/siswa/update-siswa/{id}', [SiswaController::class, 'show'])->middleware('auth')->name('update_siswa');
Route::get('/siswa/view-data-siswa/{id}', [SiswaController::class, 'destroy'])->middleware('auth')->name('delete_siswa');
Route::get('/siswa/tambah-siswa', [SiswaController::class, 'create'])->name('tambah-siswa');
Route::post('/siswa/tambah-siswa', [SiswaController::class, 'store'])->name('simpan.siswa');
Route::get('/siswa/cetak_siswa', [SiswaController::class, 'cetak_pdf'])->name('cetak_siswa')->middleware('auth');

//tanggapan
Route::patch('/tanggapan/view-data-tanggapan/', [TanggapanController::class, 'edit'])->middleware('auth')->name('save_update_tanggapan');
Route::get('/tanggapan/view-data-tanggapan', [TanggapanController::class, 'index'])->name('view-data-tanggapan');
Route::post('/pengaduan/view-data-pengaduan', [TanggapanController::class, 'store'])->name('simpan.tanggapan');
Route::get('/pengaduan/view-data-pengaduan/{id_pengaduan}', [TanggapanController::class, 'show'])->middleware('auth')->name('update_tanggapan');
Route::get('/tanggapan/cetak_tanggapan', [TanggapanController::class, 'cetak_pdf'])->name('cetak_tanggapan')->middleware('auth');
});
Route::get('/tanggapan/view-data-tanggapan/{id}', [TanggapanController::class, 'destroy'])->middleware('auth')->name('delete_tanggapan');

//komentar
Route::post('/dashboard', [Analytics::class, 'store'])->name('komentar');
Route::get('/dashboard/{id}', [Analytics::class, 'destroy'])->middleware('auth')->name('delete_komentar');
// layout
//Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
//Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
//Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
//Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
//Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
//Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
//Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
//Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
//Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
//Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');


// cards
//Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
//Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
//Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
//Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
//Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
//Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
//Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
//Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
//Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
//Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
//Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
//Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
//Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
//Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
//Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
//Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
//Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
//Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
//Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
//Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
//Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
//Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
//Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
//Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
//Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
//Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
//Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
//Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');





