<?php
use Illuminate\Routing\Router;

Route::get('mailboxesdata', [
    'as' => 'mailboxes.data',
    'uses' => 'MailboxesController@anyData',
    //'middleware' => 'can:mailboxes.mailboxes.index'
]);
Route::post('validating-email-settings', ['as' => 'validating.email.settings', 'uses' => 'Admin\helpdesk\EmailsController@validatingEmailSettings']); // route to check email input validation
Route::post('validating-email-settings-on-update/{id}', ['as' => 'validating.email.settings.update', 'uses' => 'Admin\helpdesk\EmailsController@validatingEmailSettingsUpdate']); // route to check email input validation

Route::get('getemail', 'Admin\helpdesk\SettingsController@getemail'); // direct to email setting page
Route::patch('postemail/{id}', 'Admin\helpdesk\SettingsController@postemail'); // Updating the Email table with requests


Route::get('/test', ['as' => 'thr', 'uses' => 'Agent\helpdesk\MailController@fetchdata']); /*  Fetch Emails */

Route::get('/email/ban/{id}', ['as' => 'ban.email', 'uses' => 'Agent\helpdesk\TicketController@ban']); /*  Get Ban Email */


/*
  |=============================================================
  |  Cron Job links
  |=============================================================
  |	These links are for cron job execution
  |
 */
Route::get('getMail', ['as' => 'getMail', 'uses' => 'Agent\helpdesk\MailController@getMail']);


Route::get('readmails', ['as' => 'readmails', 'uses' => 'Agent\helpdesk\MailController@readmails']);


Route::group(['prefix' => '/mailpanel'], function () {
    //Route::resource('mailboxes', 'MailboxesController');



    Route::get('/', [
        'as' => 'admin.mailboxes.mailpanel.index',
        'uses' => 'MailboxesController@maildashboard',
        //'middleware' => 'can:mailboxes.mailboxes.index'
    ]);

    Route::group(['prefix' => '/mailbanlist'], function () {
        Route::resource('banlist', 'BanlistController'); // in banlist module, for CRUD
        Route::get('/', [
            'as' => 'admin.mailpanel.mailbanlist.manage',
            'uses' => 'BanlistController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });


    Route::group(['prefix' => '/mailtemplates'], function () {
        Route::resource('mailtemplates', 'MailTemplatesController'); // in template module, for CRUD

        Route::get('/', [
            'as' => 'admin.mailpanel.mailtemplates.manage',
            'uses' => 'MailTemplatesController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });

    Route::group(['prefix' => '/mailtemplategroups'], function () {
        Route::resource('mailtemplategroups', 'MailTemplateGroupsController'); // in template module, for CRUD

        Route::get('/', [
            'as' => 'admin.mailpanel.mailtemplategroups.manage',
            'uses' => 'MailTemplateGroupsController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });







    Route::group(['prefix' => '/autoresponses'], function () {
        Route::resource('autoresponses', 'AutoResponsesController'); // in template module, for CRUD

        Route::get('/', [
            'as' => 'admin.mailpanel.autoresponses.manage',
            'uses' => 'AutoResponsesController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });


    Route::group(['prefix' => '/mailrules'], function () {
        Route::resource('mailrules', 'MailRulesController'); // in template module, for CRUD

        Route::get('/', [
            'as' => 'admin.mailpanel.mailrules.manage',
            'uses' => 'MailRulesController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });

    Route::group(['prefix' => '/breaklines'], function () {
        Route::resource('breaklines', 'BreakLinesController'); // in template module, for CRUD

        Route::get('/', [
            'as' => 'admin.mailpanel.breaklines.manage',
            'uses' => 'BreakLinesController@index',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);
    });



    Route::group(['prefix' => '/mailboxes'], function () {
        //Route::resource('mailboxes', 'MailboxesController');

        Route::get('/', [
            'as' => 'admin.mailboxes.mailboxes.manage',
            'uses' => 'MailboxesController@manage',
            //'middleware' => 'can:mailboxes.mailboxes.index'
        ]);

        Route::get('/manage', [
            'as' => 'admin.mailboxes.mailboxes.manage',
            'uses' => 'MailboxesController@manage',
            //'middleware' => 'can:mailboxes.mailboxes.create'
        ]);

        /*        Route::get('/manage', [
                    'as' => 'admin.mailboxes.mailboxes.manage',
                    'uses' => 'MailboxesController@manage',
                    //'middleware' => 'can:mailboxes.mailboxes.index'
                ]);*/
    });

    Route::group(['prefix' => '/mailbox'], function () {
        //Route::resource('mailboxes', 'MailboxesController');

        Route::get('/create', [
            'as' => 'admin.mailboxes.mailbox.create',
            'uses' => 'MailboxesController@create',
            //'middleware' => 'can:mailboxes.mailboxes.create'
        ]);
        Route::post('/', [
            'as' => 'admin.mailboxes.mailbox.store',
            'uses' => 'MailboxesController@store',
            //'middleware' => 'can:mailboxes.mailboxes.store'
        ]);
        Route::get('/{mailbox}/edit', [
            'as' => 'admin.mailboxes.mailbox.edit',
            'uses' => 'MailboxesController@edit',
            //'middleware' => 'can:mailboxes.mailboxes.edit'
        ]);
        Route::put('/{mailbox}', [
            'as' => 'admin.mailboxes.mailbox.update',
            'uses' => 'MailboxesController@update',
            //'middleware' => 'can:mailboxes.mailboxes.update'
        ]);
        Route::delete('/{mailbox}', [
            'as' => 'admin.mailboxes.mailbox.destroy',
            'uses' => 'MailboxesController@destroy',
            //'middleware' => 'can:mailboxes.mailboxes.destroy'
        ]);
        // append
    });

    // append
});



