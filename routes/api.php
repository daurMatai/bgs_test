<?php

use Illuminate\Http\Request;

Route::get('members', 'MemberController@index')->name('api.member.list');
Route::post('member', 'MemberController@store')->name('api.member.store');
Route::post('member/{member}', 'MemberController@edit')->name('api.member.edit');
Route::delete('member/{member}', 'MemberController@delete')->name('api.member.delete');
