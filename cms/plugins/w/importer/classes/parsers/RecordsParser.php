<?php namespace W\Importer\Classes\Parsers;

use Exception;
use Illuminate\Support\Arr;
use October\Rain\Support\Facades\Yaml;

/*
 * Prepare records
 */
class RecordsParser
{
    /*
     * Single meta normalizer
     */
    public static $singleMetaNormalizer = [
        'id'   => 'id',
        'slug' => 'slug',
        'file'  => 'url'
    ];

    /*
     * Multi meta normalizer
     */
    public static $multiMetaNormalizer = [
        'ids'   => 'id',
        'slugs' => 'slug',
        'files'  => 'url'
    ];

    /*
     * Prepare records from given reader and header
     */
    public static function prepareRecords($reader, $header, $ignore = [])
    {
        $records = [];

        if (method_exists($reader, 'getRecords')) {
            $data = $reader->getRecords(array_keys($header));
        } else {
            $data = $reader->setOffset(1)->fetchAssoc(array_keys($header));
        }

        foreach ($data as $record) {
            $row = [];

            foreach ($record as $column => $value) {
                $meta = $header[$column];
                // ignore column if presented in array
                if ($meta === 'ignore' || in_array($column, $ignore, true)) {
                    continue;
                }
                //
                $value = self::prepareRecordValue($value, $meta);

                // Using array dot notation
                $row = Arr::add($row, $column, $value);
            }

            foreach ($row as $model => $item) {

                // Skip empty records
                if (self::checkEmptyRecord($item)) {
                    continue;
                }
                // TODO - later: logovanie recordov pridat
                if (self::checkRecordWithoutIdentifier($item)) {
                    continue;
                }

                $records[$model][] = $item;
            }
        }

        return $records;
    }

    /*
     * Checks if provided record if empty
     */
    protected static function checkEmptyRecord($record)
    {
        // Flat record
        $record = Arr::flatten($record);

        // Check if array consist of null
        return empty(array_filter($record));
    }

    /*
     * Checks if provided record does not have identifier(id or slug)
     */
    protected static function checkRecordWithoutIdentifier($record)
    {
        return !(Arr::get($record, 'slug', false) || Arr::get($record, 'id', false));
    }

    /*
     * Parse record value based on provided meta
     */
    protected static function prepareRecordValue($value, $meta)
    {
        // convert empty strings to null, trim value
        $value = trim($value) === "" ? null : trim($value);

        // if not meta is provided, just return value
        if (!$meta) {
            return $value;
        }

        // single relations
        if (array_key_exists($meta, self::$singleMetaNormalizer)) {
            // if empty return null
            if (!$value) {
                return null;
            }
            // return [convertedMeta => value]
            return [
                self::$singleMetaNormalizer[$meta] => $value,
            ];
        }
        // general single relation
        if ($meta == 'relationOne') {
            // if empty return null
            if (!$value) {
                return null;
            }
            // get relation identifier
            $key = 'slug';

            if (preg_match('/\d+/', $value)) {
                $key = 'id';
            }
            // return [identifier => $value]
            return [
                $key => $value
            ];
        }

        // multi relation
        if (array_key_exists($meta, self::$multiMetaNormalizer)) {
            // if empty return []
            if (!$value) {
                return [];
            }
            // return [convertedMeta => value] for each relation separated by comma
            return array_map(static function ($item) use ($meta) {
                return [
                    self::$multiMetaNormalizer[$meta] => trim($item)
                ];
            }, explode(',', $value));
        }

        // general multi relation
        if ($meta == 'relationMany') {
            // if empty return []
            if (!$value) {
                return [];
            }
            // return [key => value] for each relation separated by comma
            return array_map(static function ($item) {

                $item = trim($item);

                // get relation identifier
                $key = 'slug';

                if (preg_match('/\d+/', $item)) {
                    $key = 'id';
                }

                return [
                    $key => $item
                ];
            }, explode(',', $value));
        }

        if ($meta === 'jsonable') {
            if (str_starts_with($value, '[') || str_starts_with($value, '{')) {
                return json_decode($value, true);
            }
            try {
                return Yaml::parse($value);
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage() . ' error occurred while yaml parsing' . $value);
            }
        }

        // no meta found, return value
        return $value;
    }
}
