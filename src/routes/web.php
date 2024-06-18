<?php
use Illuminate\Support\Facades\Route;
use Muzammil9555\SubscriptionPlansForStripe\Controllers\PlanController;

Route::group(['prefix' => 'subscription-plans'], function () {
    Route::resource('plans', PlanController::class);
});
