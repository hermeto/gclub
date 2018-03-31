<?php

Route::get('/', function () {
    return view('index');
});

Route::post('/start', 'StartController@process');

Route::get('/match/{id}', 'MatchController@show');

Route::get('/group', 'GroupController@show');

Route::get('/geral', 'GeralController@show');

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