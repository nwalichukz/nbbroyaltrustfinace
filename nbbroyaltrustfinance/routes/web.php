<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Index\LocaleController;
use App\Http\Controllers\Index\PageController;
use App\Http\Controllers\Dashboard\Dashboard1Controller;
//use App\Http\Controllers\StaticPages\PageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\KycController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Binary\BinaryController;
use App\Http\Controllers\Referral\ReferralController;
use App\Http\Controllers\Investment\InvestmentController;
use App\Http\Controllers\Investment\JointAccountController;
use App\Http\Controllers\Investment\CitizenByInvestment;
use App\Http\Controllers\Investment\ResidencyByInvestment;
use App\Http\Controllers\Investment\ResidencyByRealEstate;
use App\Http\Controllers\Investment\InvestmentTypeController;
use App\Http\Controllers\Wallet\UserWalletController;
use App\Http\Controllers\Wallet\DepositRequestController;
use App\Http\Controllers\Wallet\WalletAddressController;
use App\Http\Controllers\Wallet\WithdrawalRequestController;
use App\Http\Controllers\Wallet\UserTransactionHistoryController;
use App\Http\Controllers\Email\Mailer;
use App\Http\Controllers\Email\SendOtpController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\LocaleController;
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

Route::get('/', function () {
    //return view('landing/main-index');
     return view('index');
});

Route::get('/dashb', function () {
    //return view('landing/main-index');
     return view('/dashboard/index');
});



Route::get('/citizenship-inv-grenada', function () {
    return view('landing/citizenship-by-investment-grenada');
});

Route::get('/contact-us', function () {
    return view('landing/contact')->with(['title'=>'Contact Us']);
});

Route::get('/faq', function () {
    return view('landing/faq')->with(['title'=>'FAQ']);
});

Route::get('/about-us', function () {
    return view('landing/about-us')->with(['title'=>'Contact Us']);
});

Route::get('/islamic-banking', function () {
    return view('landing/islamic-banking')->with(['title'=>'Contact Us']);
});

Route::get('/real-estate-inv-antigua-and-barbuda', function () {
    return view('landing/real-estate-investment-antigua-and-barbuda');
});

Route::get('/residency-inv-australia', function () {
    return view('landing/residency-investment-australia');
});


Route::get('/get-transactions', function () {
    return view('dashboard/src/html/crm/transaction');
});

Route::get('/get-joint-account-plans', function () {
    return view('dashboard/src/html/crm/joint-account');
});

Route::get('/get-savings-account-plans', function () {
    return view('dashboard/src/html/crm/savings-account');
});


Route::get('/get-retirement-account-plans', function () {
    return view('dashboard/src/html/crm/retirement-account-plans');
});


Route::get('/successful-transfer', function () {
    return view('dashboard/src/html/crm/successful-transaction');
});


Route::get('/get-current-account-plans', function () {
    return view('dashboard/src/html/current-account-plans');
});



Route::get('/get-insurance', function () {
    return view('dashboard/src/html/pages/insurance');
});


Route::get('/get-login', function () {
    return view('dashboard/src/html/pages/auths/auth-login');
});

Route::get('/get-login-no-kyc', function () {
    return view('dashboard/src/html/pages/auths/auth-login-no-kyc');
});


Route::get('/get-register', function () {
    return view('dashboard/src/html/pages/auths/auth-register');
});


Route::get('/get-reset', function () {
    return view('dashboard/src/html/pages/auths/reset');
});


Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::view('/login', 'login');
Route::view('/register', 'register');




Route::post('/create-user', [UserController::class, 'create']);
Route::post('/update-user', [UserController::class, 'update']);
Route::any('/admin/search-user', [UserController::class, 'searchUser']);
Route::post('/user/pin/create', [UserController::class, 'setPin']);
Route::post('/post-reset-password', [Mailer::class, 'postResetPassword']);

Route::get('/receipt/{banK_name}/{account_name}/{account_number}/{amount}/{date}', [UserWalletController::class, 'generateReceipt']);



Route::get('/user-profile-setting/{id?}', [UserController::class, 'userProfileSetting']);
Route::get('admin/make-inactive-external-transfer/{id}/{status}', [UserController::class, 'externalTransferStatus']);
Route::get('admin/make-active-external-transfer/{id}/{status}', [UserController::class, 'externalTransferStatus']);


Route::get('/user/support', [UserController::class, 'support']);

Route::get('/user/security-setting/{id?}', [UserController::class, 'userSecuritySetting']);

Route::get('/admin/user-list', [UserController::class, 'userList']);


Route::get('/admin/all-users', [UserController::class, 'getAll']);
Route::get('/admin/get-account-officer', [UserController::class, 'getAccountOfficer']);

Route::any('/post-login', [AuthController::class, 'login']);

Route::get('/user-signin/{id}', [AuthController::class, 'dashboard']);


Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/user/get-joint-account', [InvestmentController::class, 'getJointAccount']);
Route::get('/admin/end-investment/{id}', [InvestmentController::class, 'endInv']);
Route::get('/user/delete-investment/{id}', [InvestmentController::class, 'delete']);

Route::post('/user/investment/create', [InvestmentController::class, 'create']);
Route::post('/user/investment/create-two', [InvestmentController::class, 'createTwo']);

Route::get('/dashboard/get-investment-page', [InvestmentController::class, 'getInvestmentPage']);
Route::get('/admin/get-all-investments', [InvestmentController::class, 'getAll']);
Route::get('/user/get-my-investments/{user_id}', [InvestmentController::class, 'myInvestments']);


Route::get('/admin/all-investments', [InvestmentController::class, 'getAll']);
Route::get('/admin/end-inv/{id}', [InvestmentController::class, 'endInv']);

Route::get('/dashboard/get-investment-page/{id}', [InvestmentController::class, 'returnInvestmentPage']);



Route::get('/admin/get-citizenship-by-investment', [CitizenByInvestment::class, 'addACitizenByInvestmentPage']);
Route::post('/admin/create-citizenship-by-investment', [CitizenByInvestment::class, 'create']);
Route::get('/admin/get-citizenship-by-investment/{id}', [CitizenByInvestment::class, 'get']);
Route::get('/admin/delete-citizenship-by-investment/{id}', [CitizenByInvestment::class, 'delete']);
Route::post('/admin/update-citizenship-by-investment', [CitizenByInvestment::class, 'update']);
Route::get('/admin/get-all-citizenship-by-investment', [CitizenByInvestment::class, 'getAll']);
Route::get('/view-citizenship-by-investment/{id}', [CitizenByInvestment::class, 'getCitizenInvPage']);


Route::get('/admin/get-residency-by-investment', [ResidencyByInvestment::class, 'addResidencyByInvestmentPage']);
Route::post('/admin/create-residency-by-investment', [ResidencyByInvestment::class, 'create']);
Route::get('/admin/get-residency-by-investment/{id}', [ResidencyByInvestment::class, 'get']);
Route::get('/admin/delete-residency-by-investment/{id}', [ResidencyByInvestment::class, 'delete']);
Route::post('/admin/update-residency-by-investment', [ResidencyByInvestment::class, 'update']);
Route::get('/admin/get-all-residency-by-investment', [ResidencyByInvestment::class, 'getAll']);
Route::get('/view-residency-by-investment/{id}', [ResidencyByInvestment::class, 'getResidencyInvPage']);



Route::post('/admin/create-residency-by-real-estate', [ResidencyByRealEstate::class, 'create']);
Route::get('/admin/get-residency-by-real-estate/{id}', [ResidencyByRealEstate::class, 'get']);
Route::get('/admin/delete-residency-by-real-estate/{id}', [ResidencyByRealEstate::class, 'delete']);
Route::post('/admin/update-residency-by-real-estate', [ResidencyByRealEstate::class, 'update']);
Route::get('/admin/get-all-residency-by-real-estate', [ResidencyByRealEstate::class, 'getAll']);
Route::get('/admin/get-residency-by-real-estate', [ResidencyByRealEstate::class, 'addResidencyByRealEstatePage']);
Route::get('/view-residency-by-real-estate/{id}', [ResidencyByRealEstate::class, 'getRealEstateInvPage']);




Route::post('/admin/create-wallet-address', [WalletAddressController::class, 'create']);
Route::get('/admin/delete-wallet-address/{id}', [WalletAddressController::class, 'delete']);
Route::post('/user/external-transfer', [UserWalletController::class, 'externalTransfer']);
Route::any('/user/confirm-external-transfer', [UserWalletController::class, 'confirmExternalTransfer']);
Route::any('/user/confirm-wallet-details', [UserWalletController::class, 'confirmUserWalletNo']);

Route::any('/user/internal-transfer/create', [UserWalletController::class, 'transferToAnotherUserWalletId']);
Route::post('/user/fund-joint-account/create', [UserWalletController::class, 'fundSecondWallet']);


Route::post('/admin/create-investment-type', [InvestmentTypeController::class, 'create']);

Route::any('/user/confirm-investment-type/{id}', [InvestmentTypeController::class, 'confirmInvestment']);
Route::get('/user/confirm-investment-type_two/{id}', [InvestmentTypeController::class, 'confirmInvestmentTwo']);

Route::get('/admin/get-all-investment-type/{id?}', [InvestmentTypeController::class, 'getAll']);

Route::get('/user/get-account-plans/{name}', [InvestmentTypeController::class, 'getAccountPlans']);

Route::get('/admin/inv-type/delete/{id}', [InvestmentTypeController::class, 'delete']);

// joint account
Route::get('/user/get-joint-account', [JointAccountController::class, 'getPage']);
Route::post('/user/joint-account-create', [JointAccountController::class, 'create']);

Route::get('/user/get-transfer-from-joint-account', [JointAccountController::class, 'getTransferTowalletPage']);



Route::get('/admin/get-all-wallet-address', [WalletAddressController::class, 'getAll']);

Route::get('/admin/add-account-type/{id?}', [InvestmentTypeController::class, 'addAccountTyePage']);
Route::get('/admin/add-wallet-address', [UserWalletController::class, 'getAddWalletPage']);

Route::get('/dashboard/get-withdrawal-page', [WalletController::class, 'getWithdrawalPage']);

Route::get('dashboard/get-fund-account', [UserWalletController::class, 'getFundAccount']);
Route::get('dashboard/get-withdrawal-request', [UserWalletController::class, 'getWithdrawalPage']);
Route::get('dashboard/get-internal-transfer', [UserWalletController::class, 'getInternalTransfer']);
Route::get('dashboard/get-external-transfer', [UserWalletController::class, 'getExternalTransfer']);
Route::post('user/transfer-from-joint-account/create', [UserWalletController::class, 'transferToWallet']);


Route::any('/user/wallet-info', [UserWalletController::class, 'myWalletDetails']);

Route::post('/admin/fund-account', [UserWalletController::class, 'makeCredit']);

Route::post('/register/get-started', [UserController::class, 'getStarted']);
Route::get('/user/get-account-officer', [UserController::class, 'accountOfficer']);
Route::get('/user/change-password', [UserController::class, 'getChangePassword']);
Route::post('/user/post-change-password', [UserController::class, 'changePassword']);

Route::get('/admin/suspend-user/{id}', [UserController::class, 'suspend']);
Route::get('/admin/unsuspend-user/{id}', [UserController::class, 'unsuspend']);

Route::get('/admin/delete-user/{id}', [UserController::class, 'delete']);

Route::get('/admin/make-admin/{id}', [UserController::class, 'makeAdmin']);
Route::get('/admin/remove-admin/{id}', [UserController::class, 'removeAdmin']);
Route::get('/admin/delete-user/{id}', [UserController::class, 'delete']);
Route::get('/admin/make-account-officer/{id}', [UserController::class, 'makeAccountOfficer']);
Route::get('/admin/remove-account-officer/{id}', [UserController::class, 'removeAccountOfficer']); 
Route::get('/admin/upload-account-officer-image/{id}', [UserController::class, 'uploadAccountOfficerProfileImagePage']);
Route::post('/admin/account-officer-image/create', [UserController::class, 'uploadAccountOfficerProfile']);


Route::post('/admin/send-mail', [Mailer::class, 'sendUserEmail']);
Route::get('/admin/send-email/{id}', [UserController::class, 'getSendEmail']);


Route::get('/dashboard/get-fund-account/{id}', [UserWalletController::class, 'getFundPage']);

// deposit request
Route::post('/admin/settle-deposit-request/create', [DepositRequestController::class, 'settleDepositRequest']);
Route::post('user/deposit-request/create', [DepositRequestController::class, 'create']);
// Route::get('/admin/deposit-request/get/{id}', [DepositRequestController::class, 'get']);
Route::get('/dashboard/my-deposit-request/{user_id}', [DepositRequestController::class, 'MyDepositRequest']);
Route::get('/admin/deposit-request/get-all', [DepositRequestController::class, 'getPendingRequest']);
Route::get('/admin/delete-deposit-request/{id}', [DepositRequestController::class, 'delete']);
Route::get('/admin/settle-deposit-request/{id}', [DepositRequestController::class, 'settlePage']);
Route::get('/admin/cancel-deposit-request/{id}', [DepositRequestController::class, 'cancelDepositRequest']);


Route::get('/user/get-kyc-page', [KycController::class, 'uploadDocPage']);
Route::post('/user/kyc-document/create', [KycController::class, 'create']);
Route::get('/admin/get-pending-kyc', [KycController::class, 'pendingKyc']);
Route::get('/admin/approve/{id}', [KycController::class, 'approve']);
Route::get('/admin/decline/{id}', [KycController::class, 'decline']);



/// withdrawal request
Route::post('/admin/settle-withdrawal-request/create', [WithdrawalRequestController::class, 'settleWithdrawalRequest']);
Route::post('user/withdrawal-request/create', [WithdrawalRequestController::class, 'create']);
// Route::get('/dashboard/my-withdrawal-request/{user_id}', [WithdrawalRequestController::class, 'MyWithdrawalRequest']);
Route::get('/admin/withdrawal-request/get-all', [WithdrawalRequestController::class, 'getPendingRequest']);
Route::get('/admin/delete-withdrawal-request/{id}', [WithdrawalRequestController::class, 'delete']);
Route::get('/admin/settle-withdrawal-request/{id}', [WithdrawalRequestController::class, 'settlePage']);
Route::get('/admin/cancel-withdrawal-request/{id}', [WithdrawalRequestController::class, 'cancelWithdrawalRequest']);


Route::get('/dashboardee/get-wallet-page', [DashboardController::class, 'walletPage']);

Route::get('/admin/get-send-email/{id}', [DashboardController::class, 'getSendEmail']);
Route::get('/admin/get-send-email-to-all', [DashboardController::class, 'getSendEmailToAll']);

Route::post('/admin/send-email-to-all-users', [Mailer::class, 'sendMassMail']);
Route::post('/admin/send-email', [Mailer::class, 'sendSingleMail']);
Route::post('/user/send-contact', [Mailer::class, 'sendContact']);
Route::post('/user/reset-password', [Mailer::class, 'postResetPassword']);

Route::get('user/send-otp/{user_id}', [SendOtpController::class, 'storeCodeSendMail']);


Route::get('/admin/all-transactions', [UserTransactionHistoryController::class, 'getAll']);
Route::get('/user/my-transactions/{id}', [UserTransactionHistoryController::class, 'getUserHistory']);
Route::get('/admin/edit-transaction/{id}', [UserTransactionHistoryController::class, 'getEdit']);
Route::get('/admin/delete-transaction/{id}', [UserTransactionHistoryController::class, 'delete']);
Route::get('/admin/get-add-transaction/{id}', [UserTransactionHistoryController::class, 'getAddTransaction']);

Route::post('admin/transaction/update', [UserTransactionHistoryController::class, 'update']);
Route::post('admin/create-user-transaction', [UserTransactionHistoryController::class, 'create']);

/*
|--------------------------------------------------------------------------
| Locale switch endpoint (not locale-prefixed — called from any page)
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

/*
|--------------------------------------------------------------------------
| All public-facing static pages live inside this locale-prefixed group.
| Every route runs through SetLocale, so every static page you build by
| extending layouts.app gets language switching for free.
|--------------------------------------------------------------------------
*/
Route::prefix('{locale?}')
    ->middleware(['setlocale'])
    ->group(function () {
        Route::get('/', [PageController::class, 'home'])->name('home');

        // Route::get('/about', [PageController::class, 'about'])->name('about');
        // Route::get('/personal-banking', [PageController::class, 'personal'])->name('personal');
        // Route::get('/security', [PageController::class, 'security'])->name('security');
    });

/*
|--------------------------------------------------------------------------
| Client Area — resources/views/layouts/client.blade.php
|--------------------------------------------------------------------------
| Kept entirely separate from the Admin Console above: its own layout,
| its own sidebar, its own route group. Wrap in your client auth
| middleware once accounts are wired up, e.g.
| Route::middleware(['auth', 'client'])->prefix('client')->group(...).
*/
Route::view('/client/dashboard', 'client.dashboard');
Route::view('/client/accounts', 'client.accounts');
Route::view('/client/transfers', 'client.transfers');
Route::view('/client/international-payments', 'client.international-payments');
Route::view('/client/beneficiaries', 'client.beneficiaries');
Route::view('/client/cards', 'client.cards');
Route::view('/client/statements', 'client.statements');

Route::view('/client/profile', 'client.profile');

Route::view('/client/support', 'client.support');

/*
|--------------------------------------------------------------------------
| Admin Console — resources/views/layouts/dashboard.blade.php
|--------------------------------------------------------------------------
| In production, wrap this group in your admin auth middleware, e.g.
| Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(...).
*/
Route::view('/dashboard', 'dashboard.index');
Route::view('/dashboard/users', 'dashboard.users');
Route::view('/dashboard/add-funds', 'dashboard.add-funds');

Route::redirect('/client-login', '/login'); 

