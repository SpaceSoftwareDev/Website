<?php namespace AppSpaceWeb\Team\Controllers;

use AppSpaceWeb\Team\Models\Team;
use BackendMenu;
use Backend\Classes\Controller;
use October\Rain\Support\Facades\Flash;

/**
 * Teams Back-end Controller
 */
class Teams extends Controller
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

        BackendMenu::setContext('AppSpaceWeb.Team', 'team', 'teams');
    }

    public function update_onUpdateVariantPosition()
    {
        $moved = [];
        $position = 0;
        if (($reorderIds = post('checked')) && is_array($reorderIds) && count($reorderIds)) {
            foreach ($reorderIds as $id) {
                if (in_array($id, $moved)) continue;

                if (!$person = Team::find($id)) continue;

                $person->sort_order = $position;
                $person->save();
                $moved[] = $id;
                $position++;
            }
            Flash::success('Successfully re-ordered variants.');
        }
    }

}
