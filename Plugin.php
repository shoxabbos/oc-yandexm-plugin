<?php namespace Webinsane\Yandexmbutton;

use Backend;
use System\Classes\PluginBase;

/**
 * Yandexmbutton Plugin Information File
 */
class Plugin extends PluginBase
{

    public function registerComponents()
    {
        return [
            \Webinsane\Yandexmbutton\Components\PaymentForm::class => 'yandexmbutton',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'category'    => 'Yandex Money',
                'label'       => 'Settings',
                'description' => 'Yandex money system',
                'icon'        => 'icon-cog',
                'class'       => 'Webinsane\Yandexmbutton\Models\Settings',
                'order'       => 1,
                'keywords'    => 'yandex money',
                'permissions' => ['manage_yandexmbutton_settings']
            ],
            'transactions' => [
                'category'    => 'Yandex Money',
                'label'       => 'Transactions hystory',
                'description' => 'History of transactions',
                'icon'        => 'icon-list-alt',
                'url'         => Backend::url('webinsane/yandexmbutton/transactions'),
                'order'       => 2,
                'permissions' => ['manage_yandexmbutton_transactions']
            ],
        ];
    }
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Yandexmbutton',
            'description' => 'No description provided yet...',
            'author'      => 'Webinsane',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }


    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'webinsane.yandexmbutton.manage_yandexmbutton_settings' => [
                'tab' => 'Yandexmbutton',
                'label' => 'Yandex money settings perm'
            ],
            'webinsane.yandexmbutton.manage_yandexmbutton_transactions' => [
                'tab' => 'Yandexmbutton',
                'label' => 'Yandex money transactions perm'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'yandexmbutton' => [
                'label'       => 'Yandexmbutton',
                'url'         => Backend::url('webinsane/yandexmbutton/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['webinsane.yandexmbutton.*'],
                'order'       => 500,
            ],
        ];
    }
}
