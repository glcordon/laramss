<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $tenants = tenancy()->all();
        $all_tenants = $tenants->map(function($x){
            $is_active = true;
            return [
                'name' => $x->data['name'] ?? '', 
                'thumb' => $x->data['thumb'] ?? '', 
                'description' => $x->data['description'] ?? '',
                'domain' => $x->domains[0] ?? '',
                'is_active' => $is_active ?? '',
                ];
        });
    return view('welcome', compact('all_tenants'));
});

Auth::routes();

Route::get('/make-mentor', function(){
    return view('mentor.create');
});

Route::get('/list-all', 'TenantController@list')->name('list-tenants');
Route::post('/create-mentor', 'TenantController@store')->name('create-tenant');

