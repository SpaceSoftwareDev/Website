<?php namespace W\Importer\Classes\Parsers;

/*
 * Prepare variables for importer
 */
class UtilParser
{
    /*
     * Prepares ignore columns
     */
    public static function mergeIgnoreColumns($additionalIgnore = [])
    {
        $ignore = [];
        
        foreach (config('w.importer::ignore', []) as $model => $columns) {
            foreach ($columns as $column) {
                $ignore[] = $model . '.' . $column;
            }
        }
        
        return array_merge($ignore, $additionalIgnore);
    }
    
    /*
     * Prepares aliases
     */
    public static function mergeAliases($additionalAliases = [])
    {
        return array_merge(config('w.importer::aliases', []), $additionalAliases);
    }
    
    /*
     * Prepare data
     */
    public static function dataFromCsvStrings($sheets)
    {
        $data = [];
        
        foreach ((array) $sheets as $sheetName => $sheet) {
            
            // !SHEET is splitter for sub sheets
            preg_match('/!SHEET,*\\r\\n/', $sheet, $splitter);
            
            if (empty($splitter)) {
                $data[$sheetName] = $sheet;
                continue;
            }
            
            foreach (explode($splitter[0], $sheet) as $index => $subSheet) {
                $data[$sheetName . ' #' . $index] = $subSheet;
            }
        }
        
        return $data;
    }
}