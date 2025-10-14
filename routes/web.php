<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;


/*Route::get('/', function () {
    return view('home');
})->name('home');*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/auction/create', [AuctionController::class, 'create'])->name('auction.create');
Route::post('/auction', [AuctionController::class, 'store'])->name('auction.store');
Route::get('/auctions', [AuctionController::class, 'index'])->name('auction.index');

Route::get('/auction/{id}', [AuctionController::class, 'show'])->name('auction.show');

Route::post('/auction/{id}/bid', [AuctionController::class, 'placeBid'])->name('auction.bid');
Route::get('/leaderboard', [BidController::class, 'leaderboard'])->name('leaderboard');
Route::post('/auction/{id}/bid', [AuctionController::class, 'storeBid'])->name('auction.bid');
Route::post('/auction/{auction}/bid', [BidController::class, 'store'])->name('auction.bid');
Route::post('/bids/{bid}/pay', [App\Http\Controllers\BidController::class, 'storePayment'])->name('bids.pay');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/user-profile', [ProfileController::class, 'showProfile'])->middleware(['auth'])->name('user.profile');
Route::get('/admin/reports/download', [ReportController::class, 'download'])
    ->name('admin.reports.download')
    ->middleware(['auth']);


    
Route::get('/my-won-auctions', [App\Http\Controllers\UserController::class, 'myWonAuctions'])
    ->middleware('auth')
    ->name('user.my_won_auctions');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


    Route::middleware(['auth'])->group(function () {
    Route::get('/admin/payments', [App\Http\Controllers\AdminPaymentController::class, 'index'])
        ->name('admin.payments.index');
});
 


Route::get('/admin/payments', [App\Http\Controllers\AdminController::class, 'viewPayments'])->name('admin.payments');




    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    // Route::get('/users', function () {
    //     return view('admin.users');
    // })->name('admin.users');

    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');

    Route::get('/logs', function () {
        return view('admin.logs');
    })->name('admin.logs');

    Route::get('/broadcast', function () {
        return view('admin.broadcast');
    })->name('admin.broadcast');


});

Route::get('/admin/auction-report', [ReportController::class, 'generatePDF'])->name('admin.auction.report');

// routes/web.php
Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/my-bids', [BidController::class, 'myBids'])->middleware('auth')->name('my.bids');
Route::get('/auctions', [AuctionController::class, 'index'])->name('auction.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
