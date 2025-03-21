<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/departments', function () {
    return view('departments');
})->name('departments');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/send', function () {
    // Di sini Anda bisa menambahkan logika untuk mengirim email
    // Tapi karena ini web statis, kita hanya redirect kembali ke halaman kontak
    return redirect()->route('contact')->with('success', 'Pesan Anda telah diterima!');
})->name('contact.send');
