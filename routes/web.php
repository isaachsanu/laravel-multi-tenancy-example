<?php

use Illuminate\Support\Facades\Route;

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

require base_path('routes/custom.php');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tenant_list', function () {
    $return = \App\Models\Tenant::all();
    $return = json_decode(json_encode($return));
    dd($return);
});

Route::get('/users_list_tenant/{tenant_id}', function ($tenant_id) {
    $tenant = \App\Models\Tenant::find($tenant_id);
    $return = collect([]);
    $tenant->run(function () use (&$return) {
        // $return = \App\Models\User::all();
        $return = \App\Models\User::with('roles')->get();
    });
    $return = json_decode(json_encode($return));
    dd($return);
});