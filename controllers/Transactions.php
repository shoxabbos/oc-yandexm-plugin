<?php namespace Webinsane\Yandexmbutton\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Transactions Back-end Controller
 */
class Transactions extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController',
    ];

    public $requiredPermissions = [
        'manage_yandexmbutton_transactions'
    ];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Webinsane.Yandexmbutton', 'transactions');
    }
}
