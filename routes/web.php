<?php

Route::get('/', function () {
    return view('index');
});

Route::post('/start', 'StartController@process');

Route::get('/group', function () {
    return view('group');
});

Route::get('/group/match', function () {
    return view('group/match');
});

Route::get('/group/overall-ranking', function () {
    return view('group/overall-ranking');
});

Route::get('/playoffs', function () {
    return view('playoffs');
});

Route::get('/playoffs/sixteenth-finals', function () {
    return view('/playoffs/sixteenth-finals');
});

Route::get('/playoffs/eighth-finals', function () {
    return view('/playoffs/eighth-finals');
});

Route::get('/playoffs/fourth-finals', function () {
    return view('/playoffs/fourth-finals');
});

Route::get('/playoffs/semifinals', function () {
    return view('/playoffs/semifinals');
});

Route::get('/playoffs/final', function () {
    return view('/playoffs/final');
});