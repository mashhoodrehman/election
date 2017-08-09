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




Route::post('/sendCode' , 'AdminController@sendCode');

Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('/search' , 'HomeController@search');

    
});




Route::get('/voters','HomeController@getvoter');



Route::get('myform/ajax/{id}','HomeController@myformAjax');

Route::get('/reset', function(){
    return view('user.home.resetpass');
});







Route::post('/userEdit/{id}', 'UserController@userUpdate');



Route::get('/','HomeController@index');
Route::get('/about','HomeController@about');
Route::get('/faqs','HomeController@viewfaqs');
Route::get('/policy','HomeController@viewpolicy');
Route::get('/terms','HomeController@viewterms');
Route::get('admin/login','AdminController@index');


Route::post('importvoter', 'websitecontroller@importvoter');
Route::post('importcandidate', 'websitecontroller@importcandidate');
/*=======================mashood routes===========================*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/voter-detail/{id}', 'HomeController@voter_detail');

Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');




Route::group(['prefix'=>'user','as'=>'user','middleware'=>'user'], function (){
    Route::get('/profile/{id}' , 'UserController@profile');
    Route::get('/addvoter' , 'UserController@addvoter');
    Route::get('/addcandidate/{id?}' , 'UserController@addcandidate');

    Route::resource('/voters','UservoterController');
    Route::resource('/candidates','UsercandidateController');

    Route::post('/candidateRateSub','candidateRating@candidateRate');

    Route::get('/candidate-rate/{id}','candidateRating@index');

});





Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.' , 'middleware' => 'admin'], function () {
            Route::get('/dashboard', 'AdminController@dashboard');
        	Route::resource('/user', 'UserController');
            Route::resource('/questions', 'QuestionsController');
            Route::resource('/answers', 'AnswersController');
            Route::get('/questions/edit/{id}','QuestionsController@editquestion');
            Route::get('/addusers', function () {
            return view('Admin.adduser');
            });
            Route::get('/addquestions', function () {
            return view('Admin.addquestions');
            });
            Route::get('/addvoter', 'voterController@addvoter');
            Route::resource('/voters','voterController');
            Route::get('/addcandidate','candidateController@addcandidate' ); 
            Route::resource('/candidates','candidateController');
            Route::get('voter', 'websitecontroller@voter');
            
            Route::get('candidate', 'websitecontroller@candidate');
            Route::get('/voters/edit/{id}','voterController@editvoter');
            Route::get('/candidates/edit/{id}','candidateController@editcandidate');

            Route::get('/policy','ContentController@viewpolicy');
            Route::get('/terms','ContentController@viewterms');
            Route::get('/faqs','ContentController@viewfaqs');

            Route::post('/addpolicy','ContentController@addpolicy');
            Route::post('/addterms','ContentController@addterms');
            Route::post('/addfaqs','ContentController@addfaqs');


            // Election Routes
            Route::get('/addElection', 'ElectionController@index');
            Route::post('/addelectiondata', 'ElectionController@addElection');
            Route::get('/electionManage', 'ElectionController@manageElection');
            Route::get('/electionsView/{id}', 'ElectionController@electionView');
            Route::get('/electionEdit/{id}', 'ElectionController@electionEdit');
            // End Election Routes








    });
});

		
		
		Route::get('register/verify/{token}', 'Auth\RegisterController@verify');  


// candidateDetail
Route::get('/candidate-detail/{id}', 'HomeController@candidate_detail');

// End candidate Detail

// candidate Rating

// End candidate Rating