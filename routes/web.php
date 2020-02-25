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

include 'test/test.php';

Route::group(['middleware' => 'guest'],function(){

	Route::group([],function(){
		Route::get('/',                                 'AuthenticationController@student'                            )->name('login');
		Route::post('/verify',                          'AuthenticationController@verifiyStudent'                     )->name('login.verify');
		Route::get('/reset',                            'AuthenticationController@reset'                              )->name('login.reset');
		Route::post('/reset/verify',                    'AuthenticationController@resetTry'                           )->name('login.reset.try');
		Route::get('/forgot',                           'AuthenticationController@forgot'                             )->name('forgot');
		Route::post('/forgot/verify',                   'AuthenticationController@forgotTry'                          )->name('forgot.verify');
	});

	Route::group(['prefix' => 'admin'],function(){
		Route::get('/',                                 'AuthenticationController@admin'                              )->name('admin.login');
		Route::post('/verify',                          'AuthenticationController@verifyAdmin'                        )->name('admin.login.verify');
	});

});

Route::group(['middleware' => 'user'],function(){
 
		Route::get('/logout',                           'AuthenticationController@logout'                             )->name('logout');

	Route::group(['prefix' => 'dashboard'],function(){
		Route::get('/',                                 'DashboardController@index'                                   )->name('dashboard'); 
	});

	Route::group(['prefix' => 'sy'],function(){
		Route::get('/',                                 'SyController@index'                                          )->name('sy');
		Route::post('/add',                             'SyController@add'                                            )->name('sy.add'); 
		Route::get('/delete/{id}',                      'SyController@delete'                                         )->name('sy.delete');
	});

	Route::group(['prefix' => 'schedule'],function(){
		Route::get('/',                                 'ScheduleController@index'                                    )->name('schedule');
		Route::post('/add',                             'ScheduleController@add'                                      )->name('schedule.add');
		Route::post('/update/{id}',                     'ScheduleController@update'                                   )->name('schedule.update');
		Route::get('/delete/{id}',                      'ScheduleController@delete'                                   )->name('schedule.delete');
	});

	Route::group(['prefix' => 'level'],function(){
		Route::get('/',                                 'LevelController@index'                                       )->name('level');
		Route::post('/add',                             'LevelController@add'                                         )->name('level.add');
		Route::post('/update/{id}',                     'LevelController@update'                                      )->name('level.update');
		Route::get('/delete/{id}',                      'LevelController@delete'                                      )->name('level.delete');
	});

	Route::group(['prefix' => 'section'],function(){
		Route::get('/',                                 'SectionController@index'                                     )->name('section');
		Route::post('/add',                             'SectionController@add'                                       )->name('section.add');
		Route::post('/update/{id}',                     'SectionController@update'                                    )->name('section.update');
		Route::get('/delete/{id}',                      'SectionController@delete'                                    )->name('section.delete');
	});

	Route::group(['prefix' => 'position'],function(){
		Route::get('/',                                 'PositionController@index'                                    )->name('position');
		Route::post('/add',                             'PositionController@add'                                      )->name('position.add'); 
		Route::post('/update/{id}',                     'PositionController@update'                                   )->name('position.update');
		Route::get('/delete/{id}',                      'PositionController@delete'                                   )->name('position.delete');
	});

	Route::group(['prefix' => 'student'],function(){
		Route::get('/',                                 'StudentController@index'                                     )->name('student');
		Route::post('/add',                             'StudentController@add'                                       )->name('student.add');
		Route::post('/import',                          'StudentController@import'                                    )->name('student.import');
		Route::get('/reset/{id}',                       'AuthenticationController@reset'                              )->name('student.reset');
		Route::post('/update/{id}',                     'StudentController@update'                                    )->name('student.update');
		Route::get('/delete/{id}',                      'StudentController@delete'                                    )->name('student.delete');
	});

	Route::group(['prefix' => 'election'],function(){
		Route::get('/',                                 'ElectionController@index'                                    )->name('election'); 
		Route::post('/add',                             'ElectionController@add'                                      )->name('election.add'); 
		Route::post('/update/{id}',                     'ElectionController@update'                                   )->name('election.update');
		Route::get('/delete/{id}',                      'ElectionController@delete'                                   )->name('election.delete');
	});

	Route::group(['prefix' => 'partylist'],function(){
		Route::get('/{election}',                       'PartyListController@index'                                   )->name('partylist');
		Route::post('/{election}/add',                  'PartyListController@add'                                     )->name('partylist.add'); 
		Route::post('/{election}/update/{id}',          'PartyListController@update'                                  )->name('partylist.update');
		Route::get('/{election}/delete/{id}',           'PartyListController@delete'                                  )->name('partylist.delete');
	});

	Route::group(['prefix' => 'candidate'],function(){
		Route::get('/{party}',                          'CandidateController@index'                                   )->name('candidate');
		Route::post('/{party}/add',                     'CandidateController@add'                                     )->name('candidate.add'); 
		Route::post('/{party}/update/{id}',             'CandidateController@update'                                  )->name('candidate.update');
		Route::get('/{party}/delete/{id}',              'CandidateController@delete'                                  )->name('candidate.delete');
	});

	Route::group(['prefix' => 'ballot'],function(){
		Route::get('/',                                 'BallotController@index'                                      )->name('ballot');
		Route::post('/vote',                            'BallotController@vote'                                       )->name('ballot.vote');  
	});

	Route::group(['prefix' => 'reports'],function(){
		Route::get('/',                                 'ReportController@index'                                      )->name('report'); 
		Route::post('/generate',                        'ReportController@generate'                                   )->name('report.generate');  
	});

	Route::group(['prefix' => 'history'],function(){
		Route::get('/',                                 'HistoryController@index'                                     )->name('history'); 
		Route::post('/generate',                        'HistoryController@generate'                                  )->name('history.generate');  
	});

	Route::group(['prefix' => 'password'],function(){
		Route::get('/',                                 'AuthenticationController@change'                             )->name('password');   
		Route::post('/save',                            'AuthenticationController@changesave'                         )->name('password.change');   
	});


});	