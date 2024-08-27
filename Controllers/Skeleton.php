<?php declare(strict_types=1);

namespace Addons\Plugins\Skeleton\Controllers;

use Addons\Plugins\Skeleton\Requests\SettingsRequest;
use App\Modules\Core\Controllers\Plugins\Plugin;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use JsValidator;
use TemplateView;

class Skeleton extends Plugin
{
    /**
     * Plugin identifier.
     */
    const IDENTIFIER = 'Skeleton';

    /**
     * Initialise the plugin.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setIdentifier(self::IDENTIFIER);

        // Register the settings page.
        $this->registerSetting('plugin.skeleton.settings');
    }

    /**
     * Get the settings page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getSettingsPage()
    {
        return TemplateView::operator('Plugins#Skeleton::settings')
            ->with('jsValidator', JsValidator::formRequest(SettingsRequest::class))
            ->with('fields', $this->settings());
    }

    /**
     * Update the settings.
     *
     * @param  SettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(SettingsRequest $request)
    {
        $data = $request->all(['setting']);

        // Work through each row of data.
        foreach ($data as $key => $value) {
            if (empty($value) && (int) $value !== 0) {
                continue;
            }

            $this->addSetting($key, $value);
        }

        // All done, return with a success message.
        Session::flash('success', Lang::get('messages.success_settings'));

        return Redirect::route('plugin.skeleton.settings');
    }

    /**
     * Plugins can run an installation routine when they are activated. This will typically include adding default
     * values, initialising database tables and so on.
     *
     * @return boolean
     */
    public function activate()
    {
        return true;
    }

    /**
     * Deactivating serves as temporarily disabling the plugin, but the files still remain. This function should
     * typically clear any caches and temporary directories.
     *
     * @return boolean
     */
    public function deactivate()
    {
        return true;
    }

    /**
     * When a plugin is uninstalled, it should be completely removed as if it never was there. This function should
     * delete any created database tables, and any files created outside of the plugin directory.
     *
     * @return boolean
     */
    public function uninstall()
    {
        // Remove settings.
        $this->removeSettings();

        return true;
    }
}
