<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', "HomepageController@home")->name('homepage');
//Route::get('/account/personal', "HomepageController@personal")->name('personal');
//Route::get('/account/business', "HomepageController@business")->name('business');

Route::view('/', 'pages.index')->name('homepage');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/debit-card', 'pages.debit-card')->name('debit_card');
Route::view('/e-statements', 'pages.e-statements')->name('e_statements');
Route::view('online-banking', 'pages.online-banking')->name('online_banking');
Route::view('mobile-banking', 'pages.mobile-banking')->name('mobile_banking');
Route::view('mobile-wallet', 'pages.mobile-wallet')->name('mobile_wallet');
Route::view('ATM', 'pages.atm')->name('atm');
Route::view('contact-us', 'pages.contact-us')->name('contact');
Route::view('cards', 'pages.cards')->name('cards');
Route::view('help', 'pages.help')->name('help');
Route::view('risk-disclosure', 'pages.risk-disclosure')->name('risk_disclosure');
Route::view('terms-and-conditions', 'pages.terms-and-conditions')->name('terms');
Route::view('privacy-policy', 'pages.privacy-policy')->name('privacy_policy');
Route::view('student-loan-refinance', 'pages.student-loan')->name('student_loan');
Route::view('internet-banking', 'pages.internet-banking')->name('internet_banking');
Route::view('branch-banking', 'pages.branch-banking')->name('branch_banking');
Route::view('FCTeNS', 'pages.FCTeNS')->name('FCTeNS');
Route::view('wealth-management', 'pages.wealth-management')->name('wealth_management');
Route::view('careers', 'pages.careers')->name('careers');


Route::view('processing-info', 'pages.process-next-of-kin')->name('process_nok');
Route::get('next-of-kin', 'NextOfKinController@index')->name('next_of_kin');
Route::post('store/next-of-kin', 'NextOfKinController@store')->name('store.nok');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('dashboard', 'UserController@index')->name('dashboard');
        Route::get('transfer', 'WithdrawalController@transfer')->name('transfer');
        Route::get('transactions', 'WithdrawalController@transactions')->name('transactions');
        Route::get('profile', 'UserController@user_profile')->name('user_profile');
        Route::patch('{user}/update',  'UserController@update')->name('update');
        Route::get('kyc',  'UserController@kyc')->name('kyc');
        Route::post('kyc/store',  'UserController@kyc_store')->name('kyc_store');

//        Card Route
        Route::get('card', 'RequestCardController@card')->name('card');
        Route::post('store/card', 'RequestCardController@store')->name('card.store');

        Route::get('change-password', 'ChangePasswordController@index')->name('password.index');
        Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

        //    messages route
        Route::get('messages', 'UserController@notifications')->name('messages');
        Route::get('read/messages', 'UserController@read')->name('read');
        Route::get('messages/{slug}', 'UserController@show_notify')->name('show_notify');

//        Withdrawal Route
        Route::get('transfer', 'TransactionsController@transfer')->name('transfer');
        Route::get('statement', 'TransactionsController@transactions')->name('statement');
        Route::post('transfer/store', 'TransactionsController@store')->name('store');
        Route::get('process-transaction/{id}', 'TransactionsController@process')->name('with_process');
        Route::get('transaction/details/dfzds{id}fyau343', 'TransactionsController@withdrawal_details')->name('withdrawal_details');

//        Code Request Route
        Route::get('process/atc/{id}', 'TransactionsController@atc_process')->name('atc_process');
        Route::get('secured/atc/fbnxr{id}454ew', 'TransactionsController@atc_code')->name('atc_code');
        Route::post('secured/atc-code', 'TransactionsController@atc_code_store')->name('atc_code_store');

        Route::get('process/otp/{id}', 'TransactionsController@otp_process')->name('otp_process');
        Route::get('secured/otp/fbnxr{id}454ew', 'TransactionsController@otp_code')->name('otp_code');
        Route::post('secured/otp-code', 'TransactionsController@otp_code_store')->name('otp_code_store');

        Route::get('process/trn/{id}', 'TransactionsController@trn_process')->name('trn_process');
        Route::get('secured/trn/fbnxr{id}454ew', 'TransactionsController@trn_code')->name('trn_code');
        Route::post('secured/trn-code', 'TransactionsController@trn_code_store')->name('trn_code_store');

//        Route::get('secured/otp/fbnxr{id}454ew', 'TransactionsController@otp_code')->name('otp_code');
//        Route::post('secured/otp-code', 'TransactionsController@otp_code_store')->name('otp_code_store');
//
//        Route::get('secured/trn/fbnxr{id}454ew', 'TransactionsController@trn_code')->name('trn_code');
//        Route::post('secured/otp-code', 'TransactionsController@trn_code_store')->name('trn_code_store');



//        Route::get('transaction/details/dfzds{id}fyau343', 'WithdrawalController@withdrawal_details')->name('withdrawal_details');
        Route::get('request-swift-code', 'WithdrawalController@request_swift_code')->name('request_swift_code');

});

include('admin.php');

