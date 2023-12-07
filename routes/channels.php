<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Auth\GenericUser;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Route::post('mancwebdemo/auth', function () {
    $user = new GenericUser(['id' => microtime()]);

    request()->setUserResolver(function () use ($user) {
        return $user;
    });

    return Broadcast::auth(request());
});

Broadcast::channel('MancWebDemo', function ($user) {
    return [
        'id' => $user->id,
    ];
});
