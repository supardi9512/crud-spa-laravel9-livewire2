<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Post;
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

Route::get('/', Post\Index::class)->name('post.index');
Route::get('/create', Post\Create::class)->name('post.create');
Route::get('/edit/{id}', Post\Edit::class)->name('post.edit');
