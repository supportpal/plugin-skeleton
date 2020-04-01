<?php

$router->get('settings', [
    'can'  => 'view.skeleton_settings',
    'as'   => 'plugin.skeleton.settings',
    'uses' => 'App\Plugins\Skeleton\Controllers\Skeleton@getSettingsPage'
]);

$router->post('settings', [
    'can'  => 'update.skeleton_settings',
    'as'   => 'plugin.skeleton.settings.update',
    'uses' => 'App\Plugins\Skeleton\Controllers\Skeleton@updateSettings'
]);
