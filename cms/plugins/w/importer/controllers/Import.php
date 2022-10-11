<?php namespace W\Importer\Controllers;

use Backend\Classes\Controller;
use Exception;
use October\Rain\Support\Facades\Flash;
use Illuminate\Support\Facades\Input;
use W\Importer\Classes\Importer;
use W\Importer\Classes\Services\ImportService;

/**
 * Importer Back-end Controller
 */
class Import extends Controller
{
    /*
     * Index action
     */
    public function index()
    {
        $this->addJs('/plugins/w/importer/controllers/import/assets/js/main.js');
        $this->addCss('/plugins/w/importer/controllers/import/assets/css/style.css');
    }

    /*
     * Index onImport ajax handler
     */
    public function index_onImport()
    {
        $aliases = ImportService::getAliasesFromRequest();
        $data = ImportService::getDataFromRequests();

        [$processedData, $flash] = Importer::import($data, $aliases);

        return [
            '#importer-flash' => sprintf("<div class='importer-flash-msg %s-flash'>%s</div>", $flash[0], $flash[1]),
            '#importer-response' => $this->makePartial('importer-response', [
                'data' => $processedData
            ]),
        ];
    }

}
