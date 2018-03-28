<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/group', function () {
    return view('group');
});

Route::get('/group/match', function () {
    return view('group/match');
});

Route::get('/group/overall-ranking', function () {
    return view('group/overall-ranking');
});