<?php
use Illuminate\Routing\Router;

Route::get('/ticketsdata', ['as' => 'tickets.data', 'uses' => 'TicketsController@anyData']);
Route::get('/tickettypesdata', ['as' => 'tickettypes.data', 'uses' => 'TicketTypesController@anyData']);
Route::get('/ticketprioritiesdata', ['as' => 'ticketpriorities.data', 'uses' => 'TicketPrioritiesController@anyData']);
Route::get('/ticketstatusesdata', ['as' => 'ticketstatuses.data', 'uses' => 'TicketStatusesController@anyData']);
Route::get('/tickethelptopicsdata', ['as' => 'tickethelptopics.data', 'uses' => 'TicketHelpTopicsController@anyData']);
Route::get('/ticketcategoriesdata', ['as' => 'ticketcategories.data', 'uses' => 'TicketCategoriesController@anyData']);
Route::get('/ticketsourcesdata', ['as' => 'ticketsources.data', 'uses' => 'TicketSourcesController@anyData']);
Route::get('/ticketlinktypesdata', ['as' => 'ticketlinktypes.data', 'uses' => 'TicketLinkTypesController@anyData']);






Route::group(['prefix' => '/ticketspanel'], function () {
    Route::resource('tickets', 'TicketsController');
    Route::get('/', ['as' => 'ticketspanel', 'uses' => 'TicketsDashBoardController@ticketsdashboard']);


    Route::resource('ticketsettings', 'TicketSettingsController');
    Route::resource('tickettypes', 'TicketTypesController');
    Route::resource('ticketstatuses', 'TicketStatusesController');
    Route::resource('ticketpriorities', 'TicketPrioritiesController');
    Route::resource('tickethelptopics', 'TicketHelpTopicsController');
    Route::resource('ticketlinktypes', 'TicketLinkTypesController');
    Route::resource('slaplans', 'SlaPlansController');
    Route::resource('autocloserules', 'AutoCloseRulesController');
    Route::resource('batchactions', 'BatchActionsController');
    Route::resource('ticketworkflows', 'WorkFlowsController');

    Route::get('/escalatetickets', ['as' => 'escalatetickets', 'uses' => 'TicketsEscalations@escalatetickets']);
    // append
});




Route::group(['prefix' => '/tickets'], function () {
    Route::resource('tickets', 'TicketsController');
    /**
     * TICKETS
     */
    Route::patch('/updatestatus/{id}', 'TicketsController@updateStatus');
    Route::patch('/updateassign/{id}', 'TicketsController@updateAssign');
    Route::post('/updatetime/{id}', 'TicketsController@updateTime');
    Route::post('/invoice/{id}', 'TicketsController@invoice');
    Route::post('/comments/{id}', 'CommentController@store');
    Route::post('select_all', ['as' => 'select_all', 'uses' => 'TicketsController@select_all']);

    Route::get('/tickets/openperdepartment/{$department}', ['as' => 'dept.open.ticket', 'uses' => 'TicketsController@openticketsperdepartment']);
    Route::get('/tickets/inprogressperdepartment/{$department}', ['as' => 'dept.inprogress.ticket', 'uses' => 'TicketsController@inprogressticketsperdepartment']);
    Route::get('/tickets/closedperdepartment/{$department}', ['as' => 'dept.closed.ticket', 'uses' => 'TicketsController@closedticketsperdepartment']);

    // append
});
