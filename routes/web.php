<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/process', 'ProcessController@run');

Route::get('/process/validate', 'ProcessController@valid');

Route::get('/match/{id}', 'MatchController@show');

Route::get('/group', 'GroupController@show');

Route::get('/geral', 'GeralController@show');

Route::get('/playoff', 'PlayoffController@run');

Route::get('/playoff/validate', 'PlayoffController@valid');

Route::get('/playoff/result/{phase}', 'PlayoffController@show');

Route::get('/reset', 'ResetController@run');