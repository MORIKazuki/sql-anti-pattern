<?php

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

Route::get('/naive-tree/closure-table', \App\Http\Actions\NaiveTree\ClosureTable\ShowAction::class)->name('naive_tree.closure_table');
Route::get('/naive-tree/naive-tree', \App\Http\Actions\NaiveTree\NaiveTree\ShowAction::class)->name('naive_tree.naive_tree');
