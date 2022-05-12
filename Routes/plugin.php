<?php declare(strict_types=1);

$router->get('settings', [
    'can'  => 'view.skeleton_settings',
    'as'   => 'plugin.skeleton.settings',
    'uses' => 'Addons\Plugins\Skeleton\Controllers\Skeleton@getSettingsPage'
]);

$router->post('settings', [
    'can'  => 'update.skeleton_settings',
    'as'   => 'plugin.skeleton.settings.update',
    'uses' => 'Addons\Plugins\Skeleton\Controllers\Skeleton@updateSettings'
]);
