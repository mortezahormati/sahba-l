<?php

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
//    dd('hi morteza');
 return view('welcome');
  // $data = [
  //     	 "condition"=>"1" ,
  //   "rid" =>"24",
  //   "sid"=> "90",
  //   "license_number"=> "421-1401-1653",
  //   "issue_date"=> "1401\\/02\\/28",
  //   "org_name"=> "\\u062a\\u0648\\u0633 \\u0627\\u0634\\u062a\\u0627\\u062a",
  //   "org_ncode"=> "10380319105",
  //   "org_address"=> "\\u062a\\u0647\\u0631\\u0627\\u0646 \\u062e \\u0627\\u0634\\u0631\\u0641\\u064a \\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\\u064a. \\u062e \\u0627\\u0628\\u0648\\u0630\\u0631 . \\u06af\\u0644\\u0633\\u062a\\u0627\\u0646 10 \\u067e 11 \\u0648\\u0627\\u062d\\u062f 8",
  //   "validity_to"=> "1404\\/02\\/28",
  //     "sell_capacity"=>"\\u062d\\u062f\\u0627\\u06a9\\u062b\\u0631 \\u0628\\u0647 \\u0645\\u064a\\u0632\\u0627\\u0646 50 \\u0645\\u06af\\u0627\\u0648\\u0627\\u062a \\u062f\\u0631 \\u0633\\u0627\\u0639\\u062a",

  // ]  ;
  // dd(json_encode($data));
});
Route::get('/login-with-phone' , [\App\Http\Controllers\Auth\LoginController::class , 'loginWithMobile'])->name('login.mobile');

Auth::routes();

Route::get('/home',\App\Http\Livewire\Admin\Dashboard\Index::class)->name('home');
