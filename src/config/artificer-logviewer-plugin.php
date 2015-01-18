<?php

return array(

    'routes' => function () {
        Route::get('logs', array('as' => 'artificer-logreader-plugin', 'uses' => 'Rap2hpoutre\LaravelLogViewer\LogViewerController@index'));
    }
);