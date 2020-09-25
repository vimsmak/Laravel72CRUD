<?php

Route::livewire('/', 'home')->name('home')->middleware('auth');
Route::group(['middleware'=>'guest'], function () {
    Route::livewire('/login', 'login')->name('login');
    Route::livewire('/register', 'register');
});
Route::livewire('/about', 'about')->name('about');
Route::livewire('/contact-us', 'contact-us')->name('contactus');
Route::livewire('/services', 'services')->name('services');
Route::livewire('/userlist', 'user-list')->name('userlist')->middleware('auth');
Route::livewire('/album', 'file-uploader')->name('album')->middleware('auth');