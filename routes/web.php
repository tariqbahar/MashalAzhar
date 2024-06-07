<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\InsideController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WorkController;

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
Route::get('/agent/home', [AgentController::class, 'AgentDashboard'])->name('agent.home');
Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
    //admin Group milddleware
Route::middleware(['auth','role:admin'])->group(function(){ 
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
   // Route::get('/admin/insidecost', [AdminController::class, 'AdminInsidecost'])->name('admin.insidecost');
    Route::get('/admin/sales',[AdminController::class, 'AdminSales'])->name('admin.sales');
    Route::get('/admin/daily',[AdminController::class, 'AdminDaily'])->name('admin.daily');
    Route::get('/admin/weakly',[AdminController::class, 'AdminWeakly'])->name('admin.weakly');
    Route::get('/admin/monthly',[AdminController::class, 'AdminMonthly'])->name('admin.monthly');
    Route::get('/admin/salanty',[AdminController::class, 'Adminsalanty'])->name('admin.salanty');
    Route::get('/admin/mencha',[AdminController::class, 'Adminmencha'])->name('admin.mencha');
    Route::get('/admin/loans',[AdminController::class, 'AdminLoans'])->name('admin.loans');
    Route::get('/admin/insidecost/store',[AdminController::class, 'AdmininsInsidecost'])->name('admin.insidecost.store');

    

});//end Group Admin Middleware


    //agent Group middleware
Route::middleware(['auth','role:agent' ])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});   //end agent groupe middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

   //admin Group milddleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(InsideController::class)->group(function(){


        Route::post('/store/cost', 'StoreType')->name('store.cost');
        Route::get('/admin/insidecost', [InsideController::class, 'AdminInsidecost'])->name('admin.insidecost');
        Route::get('/admin/addtype', [InsideController::class, 'addtype'])->name('admin.addtype');
        Route::post('/addnewtype', [InsideController::class, 'addnewtype'])->name('addnewtype');
        Route::get('costdestory/{id}', [InsideController::class, 'costdelete'])->name('costdestory');
        Route::get('/cost/edit/{id}', [InsideController::class, 'costedit'])->name('costedit');
        Route::get('saledestory/{id}', [SaleController::class, 'saledelete'])->name('saledestory');
        Route::post('/update/costconfirm/{id}', [InsideController::class, 'updateCostConfirm'])->name('update_cost_confirm');
        Route::get('/sale/edit/{id}', [SaleController::class, 'saleedit'])->name('saleedit');
        Route::post('/update/saleconfirm/{id}', [SaleController::class, 'updatesaleConfirm'])->name('update_sale_confirm');
        Route::get('/print/pdf/{id}', [InsideController::class, 'printPDF'])->name('print_pdf');
        Route::get('/total/report/', [InsideController::class, 'cost_report'])->name('cost_report');
        Route::get('/add/user/', [InsideController::class, 'adduser'])->name('add_user');
        Route::post('/new/user/', [InsideController::class, 'newuser'])->name('new_user');
        Route::get('/weakly/work/report/', [InsideController::class, 'weakly_work_report'])->name('weakly_work_report');
        Route::get('workdestory/{id}', [WorkController::class, 'workdelete'])->name('workdestory');
        Route::get('buyerinfo/{id}', [SaleController::class, 'buyerinfo'])->name('buyerinfo');
        Route::get('insertMony', [InsideController::class, 'index'])->name('insertmony');
        Route::post('/mony', [InsideController::class, 'adminmony'])->name('adminmony');

    });//end Group Admin Middleware
    });
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(SaleController::class)->group(function(){
    
            Route::post('/store/sell',  'StoreSell')->name('store.sell');
            Route::get('/admin/sales', [SaleController::class, 'AdminSale'])->name('admin.sales');
            Route::get('producttype', [SaleController::class, 'ProductType'])->name('producttype');
            Route::post('addproducttype', [SaleController::class, 'AddProductType'])->name('addproducttype');

    
        });
        });//end Group Admin Middleware

        Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(WorkController::class)->group(function(){
        Route::post('/addwork',  'AddWork')->name('addwork');
        Route::get('/admin/work', [WorkController::class, 'AdminWork'])->name('admin.work');
             
        
            });
            });//end Group Admin Middleware