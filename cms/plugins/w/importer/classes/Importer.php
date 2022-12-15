<?php namespace W\Importer\Classes;

use Exception;
use League\Csv\Reader;
use October\Rain\Support\Facades\Event;
use W\Importer\Classes\Seeder\ModelSeeder;
use W\Importer\Classes\Parsers\UtilParser;
use W\Importer\Classes\Parsers\HeaderParser;
use W\Importer\Classes\Parsers\RecordsParser;

class Importer
{
    /*
     * Import
     */
    public static function import($data, $additionalAliases = [], $additionalIgnore = [])
    {
        $flash = ['success', 'Data successfully imported'];
        $processedRecords = [];

        $ignore = UtilParser::mergeIgnoreColumns($additionalIgnore);
        $aliases = UtilParser::mergeAliases($additionalAliases);
        $data = UtilParser::dataFromCsvStrings($data);

        Event::fire('w.importer.beforeImport', [&$data, &$aliases, &$ignore]);

        foreach ($data as $sheetKey => $singleData) {
            try {
                $data = self::prepareRecords($singleData, $aliases, $ignore);

                Event::fire('w.importer.beforeSeedData', [&$data]);

                foreach ($data as $modelAlias => $records) {
                    $model = $aliases[$modelAlias];
                    $processedRecords[$sheetKey][$modelAlias] = collect();

                    foreach ($records as $record) {
                        $processedRecords[$sheetKey][$modelAlias]->push($record);
                        ModelSeeder::seed($model, $record);
                    }
                }

            } catch (Exception $exception) {
                $flash = ['error', $exception->getMessage()];
            }
        }

        Event::fire('w.importer.import', [&$processedRecords]);

        return [$processedRecords, $flash];
    }

    /*
     * Prepare single file data
     */
    protected static function prepareRecords($data, $aliases, $ignore)
    {
        $reader = Reader::createFromString($data);
        $header = HeaderParser::prepareHeader($reader, $aliases);

        return RecordsParser::prepareRecords($reader, $header, $ignore);
    }
}
