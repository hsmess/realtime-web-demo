<?php

use App\Http\Requests\ParticipantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/contact', function (Request $request) {
    \Illuminate\Support\Facades\Notification::send(
        \App\Models\Participant::all(),
        new \App\Notifications\DemoNotification());
});

Route::post('/participant',function (ParticipantRequest $request){
    \App\Models\Participant::create([
        'name' => $request->name,
        'email_address' => $request->email,
        'phone_number' => $request->phone
    ]);
    return true;
});
