<?php namespace SpacePub\ContactForm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Contact Forms Back-end Controller
 */
class ContactForms extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['spacepub.contactform.access_contactforms'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('SpacePub.ContactForm', 'contactform', 'contactforms');
    }
}
