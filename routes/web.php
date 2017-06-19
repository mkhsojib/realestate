<?php
//Admin routes

Route::group(['middleware' => ['web', 'admin']], function (){
    //Users data
    Route::GET('adminpanel/users/data',[
        'as' => 'adminpanel/users/data',
        'uses' => 'UserController@anyData'
    ]);

    //Buildings data
    Route::GET('adminpanel/building/data',[
        'as' => 'adminpanel/building/data',
        'uses' => 'BuildingController@anyData',
    ]);

    //Contact data
    Route::GET('adminpanel/contact/data',[
        'as' => 'adminpanel/contact/data',
        'uses' => 'ContactController@anyData',
    ]);

    //Admin login
    Route::GET('adminpanel', 'AdminController@index');

    //Users list
    Route::RESOURCE('adminpanel/users', 'UserController');

    //Update password
    Route::POST('adminpanel/user/changepassword', 'UserController@updatePassword');

    //Delete user
    Route::GET('adminpanel/users/{id}/delete', 'UserController@destroy');

    //Site settings
    Route::GET('adminpanel/sitesettings', 'SiteSettingsController@index');

    //Change site settings
    Route::POST('adminpanel/sitesettings', 'SiteSettingsController@store');

    //Buildings list
    Route::RESOURCE('adminpanel/building', 'BuildingController');

    //Buildings Statistics by year
    Route::GET('adminpanel/chart', 'AdminController@Chart');

    //Buildings Statistics
    Route::POST('adminpanel/chart', 'AdminController@YearChart');

    //Activate building
    Route::GET('adminpanel/change-status/{id}/{status}', 'BuildingController@ActivateBuilding');

    //Delete buildings
    Route::GET('adminpanel/building/{id}/delete', 'BuildingController@destroy');

    //Emails list
    Route::RESOURCE('adminpanel/contact', 'ContactController');

    //Delete emails
    Route::GET('adminpanel/contact/{id}/delete', 'ContactController@destroy');
});


//User routes

//Landing page
Route::GET('/', function () {
    return view('welcome');
});

//Home page
Route::GET('/home', 'HomeController@index');

//Buildings routes

//Show all buildings
Route::GET('all-buildings', 'BuildingController@showAllEnabled');

//Show for-rent buildings
Route::GET('for-rent', 'BuildingController@forRent');

//Show for-buy buildings
Route::GET('for-buy', 'BuildingController@forBuy');

//Show buildings according to type
Route::GET('type/{type}', 'BuildingController@Type');

//Search buildings
Route::GET('search', 'BuildingController@Search');

//Show inactive buildings
Route::GET('user/inactive-building', 'BuildingController@InactiveBuilding');

//Show single building
Route::GET('single-building/{id}', 'BuildingController@SingleBuilding');

//Get AJAX information
Route::GET('ajax/building/information', 'BuildingController@GetAjaxInformation');

//Contact Us
Route::GET('contact', 'HomeController@Contact');

//Contact Us
Route::POST('contact', 'ContactController@store');

//Add building
Route::GET('user/add/building', 'BuildingController@UserAddBuilding');
Route::POST('user/add/building', 'BuildingController@UserStore');

//User's building
Route::GET('user/my-buildings', 'BuildingController@ShowUserBuilding');

//Edit user
Route::GET('user/edit', 'UserController@EditUser')->middleware('auth');

//Update user
Route::PATCH('user/edit',[
    'as' => 'user/edit',
    'uses' => 'UserController@UpdateUser',
])->middleware('auth');

//Change password
Route::POST('user/change-password', 'UserController@ChangePassword')->middleware('auth');

//Edit inactive building
Route::GET('user/edit/building/{id}', 'BuildingController@UserEditBuilding')->middleware('auth');
Route::PATCH('user/update/building', 'BuildingController@UserUpdateBuilding')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Authentication routes
Auth::routes();
