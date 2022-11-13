<?php namespace AppSpaceWeb\TeamMember\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Team Members Back-end Controller
 */
class TeamMembers extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('AppSpaceWeb.TeamMember', 'teammember', 'teammembers');
    }
}
