<?php

use Illuminate\Support\Facades\Route;

Route::get('/users_list', function () {
    // $users = \App\Models\User::all();
    $users = \App\Models\User::with('roles')->get();
    // $users = \App\Models\User::with('userroles')->get();

    $users = json_decode(json_encode( $users ));
    dd($users);
});