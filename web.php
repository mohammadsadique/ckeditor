<?php

use Illuminate\Support\Facades\Route;


Route::post('ckeditor/upload', 'ZoologyController@upload')->name('ckeditor.upload');
