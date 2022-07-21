<?php

use App\Http\Controllers\Api\Common\NotificationController;
use App\Http\Controllers\Api\Customer\ForgotPassController;
use App\Http\Controllers\Api\Customer\LoginController;
use App\Http\Controllers\Api\Customer\OrderController;
use App\Http\Controllers\Api\Customer\PharmacyController;
use App\Http\Controllers\Api\Customer\RegisterController;
use App\Http\Controllers\Api\Customer\UploadPrescriptionController;
use App\Http\Controllers\Api\Pharmassist\LoginController as PharmassistLoginController;
use App\Http\Controllers\Api\Pharmassist\PrescriptionController;
use App\Http\Controllers\Api\Pharmassist\RegisterController as PharmassistRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//------------- CUSTOMER AUTHENTICATION API ROUTES -------------------//
Route::post('logincustomer', [LoginController::class, 'loginCustomer']);
Route::post('createcustomer', [RegisterController::class, 'CreateCustomer']);
Route::post('forgotpassword', [ForgotPassController::class, 'forgotPassword']);
Route::post('verifyOtp', [ForgotPassController::class, 'verifyOtp']);
Route::post('changePassword', [ForgotPassController::class, 'changePassword']);
Route::post('updatePassword', [RegisterController::class, 'updatePassword']);
//------------- CUSTOMER AUTHENTICATION API ROUTES END -------------------//


//------------- PHARMACY AUTHENTICATION API ROUTES -------------------//
Route::post('createpharmacy', [PharmassistRegisterController::class, 'createPharmacy']);
Route::post('loginpharmacy', [PharmassistLoginController::class, 'loginPharmacy']);
//------------- PHARMACY AUTHENTICATION API ROUTES END -------------------//


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('appNotifications',[NotificationController::class, 'appNotifications']);
    Route::get('readNotification/{id}', [NotificationController::class, 'readNotification']);
    Route::get('getNotificationCustomer', [NotificationController::class, 'getNotificationCustomer']);
    Route::get('getNotificationPharmacy', [NotificationController::class, 'getNotificationPharmacy']);
    Route::post('contactSupport',[LoginController::class, 'contactSupport']);
    //------------- CUSTOMER API ROUTES -------------------//
    Route::group(['prefix' => 'customer'], function () {
        Route::post('UpdateCustomer', [RegisterController::class, 'updateCustomer']);
        Route::get('GetAllPharmacy', [PharmacyController::class, 'getPharmacy']);
        Route::post('UploadPrescription', [UploadPrescriptionController::class, 'uploadPrescription']);
        Route::get('GetPrescriptionPricing/{id}', [UploadPrescriptionController::class, 'getPricing']);
        Route::get('/getSingleCustomer/{id}', [PharmacyController::class, 'getSingleCustomer']);
        Route::post('/addRatings', [RatingController::class, 'addRatings']);
        Route::get('getCustomerPrescriptions', [UploadPrescriptionController::class, 'getCustomerPrescriptions']);
        Route::get('getSinglePrescription', [UploadPrescriptionController::class, 'getSinglePrescription']);
        Route::post('updatePrescriptionImage', [UploadPrescriptionController::class, 'updatePrescriptionImage']);
        Route::post('cancelOrder', [OrderController::class, 'cancelOrder']);
        Route::post('deleteItem', [OrderController::class, 'deleteItem']);
        Route::post('makePayment', [OrderController::class, 'makePayment']);
    });
    //------------- CUSTOMER API ROUTES END -------------------//
});

//------------- PHARMACY API ROUTES -------------------//
Route::group(['prefix' => 'pharmacy'], function () {
    Route::get('GetPrescriptions/{id}', [PrescriptionController::class, 'getPrescriptions']);
    Route::post('PrescriptionPricing', [PrescriptionController::class, 'prescriptionPricing']);
    Route::get('getSinglePharmacy/{id}', [PrescriptionController::class, 'getSinglePharmacy']);
    Route::post('pickupStatus',[PrescriptionController::class, 'pickupStatus']);
});
    //------------- PHARMACY API ROUTES END -------------------//
