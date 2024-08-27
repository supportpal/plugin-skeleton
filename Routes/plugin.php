<?php declare(strict_types=1);

if (! isset($router)) {
    throw new RuntimeException('Variable $router is not defined.');
}

$router->get('settings', [
    'as'   => 'plugin.skeleton.settings',
    'uses' => 'Addons\Plugins\Skeleton\Controllers\Skeleton@getSettingsPage'
]);

$router->post('settings', [
    'as'   => 'plugin.skeleton.settings.update',
    'uses' => 'Addons\Plugins\Skeleton\Controllers\Skeleton@updateSettings'
]);
