<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',['as'=>'home','uses'=>'HomeController@getHome']);
Route::get('/menu/{id}/{name}','HomeController@menu');
Route::get('user-login',['as'=>'user-login','uses'=>'HomeController@getLogIn']);
Route::post('user-login',['as'=>'user-login','uses'=>'MemberAuthController@postLogIn']);
Route::get('user-registration',['as'=>'user-registration','uses'=>'HomeController@getRegistration']);
Route::post('user-registration',['as'=>'registration-post','uses'=>'HomeController@postRegistration']);
Route::get('payment-invoice/{id}',['as'=>'payment-invoice','uses'=>'HomeController@paymentInvoice']);
Route::post('paypal-ipn',['as'=>'paypal-ipn','uses'=>'HomeController@paypalIpn']);
Route::get('user-logout',['as'=>'user-logout','uses'=>'MemberAuthController@logout']);
Route::get('contact-us',['as'=>'contact-us','uses'=>'HomeController@getContact']);
Route::post('contact-send',['as'=>'contact-send','uses'=>'HomeController@postContact']);
Route::post('search-schedule',['as'=>'search-schedule','uses'=>'HomeController@searchSchedule']);
//Authentication Route List
Route::get('/admin', ['as'=>'login', 'uses'=>'AdminAuthController@getLogin']);
Route::post('/admin', ['as'=>'admin-login', 'uses'=>'AdminAuthController@postLogin']);
Route::get('/logout', ['as'=>'logout','uses'=>'AdminAuthController@logout']);

/* Admin password Change*/
Route::get('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@getChangePass']);
Route::post('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@postChangePass']);

/* Admin Dashboard Route List */
Route::get('dashboard',['as'=>'dashboard','uses'=>'DashboardController@getDashboard']);

/*WebSetting Route List*/
Route::get('general-setting', ['as'=>'general-setting', 'uses'=>'WebSettingController@getGeneralSetting']);
Route::put('general-setting/{id}', ['as'=>'update_general', 'uses'=>'WebSettingController@putGeneralSetting']);

/* Slider Setting */
Route::get('slider', ['as'=>'slider', 'uses' =>'WebSettingController@getSlider']);
Route::post('slider', ['as'=>'post_slider', 'uses' =>'WebSettingController@postSlider']);
Route::delete('slider-delete', ['as'=>'slider-delete', 'uses' =>'WebSettingController@deleteSlider']);

/* Menu Route List*/
Route::get('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@getMenuCreate']);
Route::post('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@postMenuCreate']);
Route::get('menu-show',['as'=>'menu_show','uses'=>'WebSettingController@showMenuCreate']);
Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenuCreate']);
Route::put('menu-edit/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenuCreate']);
Route::delete('menu-delete/{id}',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenuCreate']);

/* API Route List*/
Route::get('api-create',['as'=>'api_create','uses'=>'WebSettingController@getApiCreate']);
Route::post('api-create',['as'=>'api_create','uses'=>'WebSettingController@postApiCreate']);
Route::get('api-show',['as'=>'api_show','uses'=>'WebSettingController@showApiCreate']);
Route::get('api-edit/{id}',['as'=>'api-edit','uses'=>'WebSettingController@editApiCreate']);
Route::put('api-edit/{id}',['as'=>'api-update','uses'=>'WebSettingController@updateApireate']);
Route::delete('api-delete/{id}',['as'=>'api-delete','uses'=>'WebSettingController@deleteApiCreate']);

/*Currency Route List */
Route::get('currency-create',['as'=>'currency-create','uses'=>'DashboardController@createCurrency']);
Route::post('currency-create', ['as'=>'currency_store','uses'=>'DashboardController@storeCurrency']);
Route::get('currency', ['as'=>'currency_show','uses'=>'DashboardController@showCurrency']);
Route::get('currency-edit/{id}', ['as'=>'currency_edit','uses'=>'DashboardController@editCurrency']);
Route::put('currency-edit/{id}', ['as'=>'currency_update','uses'=>'DashboardController@updateCurrency']);
Route::delete('currency-delete', ['as'=>'currency_delete','uses'=>'DashboardController@deleteCurrency']);

/* Testimonial Route List */
Route::get('manage-testimonial',['as'=>'manage-testimonial','uses'=>'DashboardController@mangeTestimonial']);
Route::post('manage-testimonial',['as'=>'manage-testimonial','uses'=>'DashboardController@storeTestimonial']);
Route::get('testimonial-edit/{id}',['as'=>'testimonial-edit','uses'=>'DashboardController@editTestimonial']);
Route::put('testimonial-edit/{id}',['as'=>'testimonial-update','uses'=>'DashboardController@updateTestimonial']);
Route::delete('testimonial-delete',['as'=>'testimonial-delete','uses'=>'DashboardController@deleteTestimonial']);


/* Loan Package Route List */
Route::get('loan-create',['as'=>'loan-create','uses'=>'DashboardController@createLoanPackage']);
Route::post('loan-create',['as'=>'loan-create','uses'=>'DashboardController@storeLoanPackage']);
Route::get('loan-show',['as'=>'loan-show','uses'=>'DashboardController@showLoanPackage']);
Route::get('loan-edit/{id}',['as'=>'loan-edit','uses'=>'DashboardController@editLoanPackage']);
Route::put('loan-edit/{id}',['as'=>'loan-update','uses'=>'DashboardController@updateLoanPackage']);

/* Deposit Package Route List */
Route::get('deposit-create',['as'=>'deposit-create','uses'=>'DashboardController@createDepositPackage']);
Route::post('deposit-create',['as'=>'deposit-create','uses'=>'DashboardController@storeDepositPackage']);
Route::get('deposit-show',['as'=>'deposit-show','uses'=>'DashboardController@showDepositPackage']);
Route::get('deposit-edit/{id}',['as'=>'deposit-edit','uses'=>'DashboardController@editDepositPackage']);
Route::put('deposit-edit/{id}',['as'=>'deposit-update','uses'=>'DashboardController@updateDepositPackage']);

/* Installment Route List */
Route::get('type-create',['as'=>'type-create','uses'=>'DashboardController@createType']);
Route::post('type-create',['as'=>'type-create','uses'=>'DashboardController@storeType']);
Route::get('type-show',['as'=>'type-show','uses'=>'DashboardController@showType']);
Route::get('type-edit/{id}',['as'=>'type-edit','uses'=>'DashboardController@editType']);
Route::put('type-edit/{id}',['as'=>'type-update','uses'=>'DashboardController@updateType']);

/* Staff Route List */
Route::get('staff-create',['as'=>'staff-create','uses'=>'DashboardController@createStaff']);
Route::post('staff-create',['as'=>'staff-create','uses'=>'DashboardController@storeStaff']);
Route::get('staff-show',['as'=>'staff-show','uses'=>'DashboardController@showStaff']);
Route::get('staff-deactive/{id}',['as'=>'staff-deactive','uses'=>'DashboardController@deActiveStaff']);
Route::get('staff-active/{id}',['as'=>'staff-active','uses'=>'DashboardController@ActiveStaff']);
Route::get('staff-edit/{id}',['as'=>'staff-edit','uses'=>'DashboardController@editStaff']);
Route::put('staff-edit/{id}',['as'=>'staff-update','uses'=>'DashboardController@updateStaff']);
Route::post('staff-password-change',['as'=>'staff-password-change','uses'=>'DashboardController@passwordChangeStaff']);

/* Loan Route List */
Route::get('lend-create',['as'=>'lend-create','uses'=>'DashboardController@createLend']);
Route::get('lend-calc',['as'=>'lend-calc','uses'=>'DashboardController@calcLend']);
Route::post('lend-create',['as'=>'lend-create','uses'=>'DashboardController@storeLend']);
Route::get('loner-details/{id}',['as'=>'loner-details','uses'=>'DashboardController@detailsLend']);
Route::get('lend-edit/{id}',['as'=>'lend-edit','uses'=>'DashboardController@editLend']);
Route::put('lend-edit/{id}',['as'=>'loaner-update','uses'=>'DashboardController@updateLend']);
Route::post('loner-confirm',['as'=>'loner-confirm','uses'=>'DashboardController@confirmLoner']);
Route::get('lend-show',['as'=>'lend-show','uses'=>'DashboardController@showLend']);
Route::get('loan-schedule/{id}',['as'=>'loan-schedule','uses'=>'DashboardController@scheduleLoanShow']);

/* Depositor Route List */
Route::get('depositor-crate',['as'=>'depositor-create','uses'=>'DashboardController@createDepositor']);
Route::post('depositor-crate',['as'=>'depositor-create','uses'=>'DashboardController@storeDepositor']);
Route::get('depositor-details/{id}',['as'=>'depositor-details','uses'=>'DashboardController@detailsDepositor']);
Route::get('depositor-edit/{id}',['as'=>'depositor-edit','uses'=>'DashboardController@editDepositor']);
Route::put('depositor-edit/{id}',['as'=>'depositor-update','uses'=>'DashboardController@updateDepositor']);
Route::post('depositor-confirm',['as'=>'depositor-confirm','uses'=>'DashboardController@confirmDepositor']);
Route::get('depositor-show',['as'=>'depositor-show','uses'=>'DashboardController@showDepositor']);
Route::get('depositor-schedule/{id}',['as'=>'depositor-schedule','uses'=>'DashboardController@scheduleDepositorShow']);

/* Loan Installment Route List */
Route::get('loan-installment',['as'=>'loan-installment','uses'=>'DashboardController@loanInstallment']);
Route::post('loaner-paid',['as'=>'loaner-paid','uses'=>'DashboardController@loanInstallmentPay']);

/* Depositor Installment Route List */
Route::get('depositor-installment',['as'=>'depositor-installment','uses'=>'DashboardController@depositInstallment']);


/* ----------- Staff Route List --------------- */

Route::get('staff', ['as'=>'staff-login', 'uses'=>'AdminAuthController@getStaffLogin']);
Route::post('staff', ['as'=>'staff-post-login', 'uses'=>'AdminAuthController@postStaffLogin']);
Route::get('staff-logout', ['as'=>'staff-logout','uses'=>'AdminAuthController@staffLogout']);

/* Staff password Change*/
Route::get('staff-change-pass', ['as'=>'staff-change-pass', 'uses'=>'StaffController@getChangePass']);
Route::post('staff-change-pass', ['as'=>'staff-change-pass', 'uses'=>'StaffController@postChangePass']);

/* Staff Dashboard Route List */
Route::get('/staff-dashboard',['as'=>'staff-dashboard','uses'=>'StaffController@getDashboard']);

/* Staff Loan Create */
Route::get('staff-lend-create',['as'=>'staff-lend-create','uses'=>'StaffController@createLend']);
Route::get('staff-lend-calc',['as'=>'staff-lend-calc','uses'=>'StaffController@calcLend']);
Route::post('staff-lend-create',['as'=>'staff-lend-create','uses'=>'StaffController@storeLend']);
Route::get('staff-loner-details/{id}',['as'=>'staff-loner-details','uses'=>'StaffController@detailsLend']);
Route::get('staff-lend-edit/{id}',['as'=>'staff-lend-edit','uses'=>'StaffController@editLend']);
Route::put('staff-lend-edit/{id}',['as'=>'staff-loaner-update','uses'=>'StaffController@updateLend']);
Route::post('staff-loner-confirm',['as'=>'staff-loner-confirm','uses'=>'StaffController@confirmLoner']);
Route::get('staff-lend-show',['as'=>'staff-lend-show','uses'=>'StaffController@showLend']);
Route::get('staff-loan-schedule/{id}',['as'=>'staff-loan-schedule','uses'=>'StaffController@scheduleLoanShow']);

/* Staff Depositor Route List */
Route::get('staff-depositor-crate',['as'=>'staff-depositor-crate','uses'=>'StaffController@createDepositor']);
Route::post('staff-depositor-crate',['as'=>'staff-depositor-create','uses'=>'StaffController@storeDepositor']);
Route::get('staff-depositor-details/{id}',['as'=>'staff-depositor-details','uses'=>'StaffController@detailsDepositor']);
Route::get('staff-depositor-edit/{id}',['as'=>'staff-depositor-edit','uses'=>'StaffController@editDepositor']);
Route::put('staff-depositor-edit/{id}',['as'=>'staff-depositor-update','uses'=>'StaffController@updateDepositor']);
Route::post('staff-depositor-confirm',['as'=>'staff-depositor-confirm','uses'=>'StaffController@confirmDepositor']);
Route::get('staff-depositor-show',['as'=>'staff-depositor-show','uses'=>'StaffController@showDepositor']);
Route::get('staff-depositor-schedule/{id}',['as'=>'staff-depositor-schedule','uses'=>'StaffController@scheduleDepositorShow']);

/* Collect Loan Installment */
Route::get('staff-loan-installment',['as'=>'staff-loan-installment','uses'=>'StaffController@loanInstallment']);
Route::post('loaner-pay',['as'=>'loaner-pay','uses'=>'StaffController@loanInstallmentPay']);
Route::post('loan-paid',['as'=>'loan-paid','uses'=>'StaffController@loanInstallmentPaid']);

/* Deposit Collected Route List */
Route::get('staff-deposit-installment',['as'=>'staff-deposit-installment','uses'=>'StaffController@depositInstallment']);
Route::post('loaner-pay',['as'=>'loaner-pay','uses'=>'StaffController@loanInstallmentPay']);
Route::post('loan-paid',['as'=>'loan-paid','uses'=>'StaffController@loanInstallmentPaid']);
