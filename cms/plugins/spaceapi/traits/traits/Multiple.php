<?php namespace SpaceApi\Traits\Traits;

use October\Rain\Support\Facades\Schema;
use October\Rain\Exception\ApplicationException;

trait Multiple {

    protected static function _getMultipleQuery($model, $query, $sort = null)
    {
        $loops = array_intersect($model::$allowedMultipleQueryKeys, array_keys($query));

        $multipleQuery = $model::raw('1 = 1');

        foreach ($loops as $loop) {
            $values = explode(',', $query[$loop]);

            if ($loop == 'slug') {
                foreach ($values as $value) {
                    $multipleQuery->orWhere('slug', $value)
                    ->when(is_numeric($value), function ($query) use ($value) {
                        $query->orWhere('id', $value);
                    });
                }
                continue;
            }

            switch (Schema::getColumnType((new $model)->getTable(), $loop)) {
                case 'integer':
                    $multipleQuery->whereIn($loop, $values);
                    break;

                default:
                    $multipleQuery->where($loop, 'REGEXP', implode('|', $values));
                    break;
            }
        }

        $softField = 'created_at';
        $sortDirection = 'desc';

        if (!is_null($sort)) {
            if (is_array($sort)) {
                if (sizeof($sort) !== 2) {
                    throw new ApplicationException('Sort parameters must be 2.');
                }

                $softField = $sort[0];
                $sortDirection = $sort[1];
            }
            else {
                $softField = $sort;
            }
        }

        return $multipleQuery->orderBy($softField, $sortDirection);
    }

    protected static function _verifyMultipleRequest($model, $query)
    {
        $allowedMultipleAttributes = $model::$allowedMultipleQueryKeys;

        $allowedMultipleAttributes[] = 'results_per_page';
        $allowedMultipleAttributes[] = 'page';

        $requestedMultipleAttributes  = array_keys($query);

        $restrictedMultipleAttributes = array_diff($requestedMultipleAttributes, $allowedMultipleAttributes);

        if (!empty($restrictedMultipleAttributes)) {
            throw new ApplicationException('Input parameter(s) now allowed: ' . implode(', ', $restrictedMultipleAttributes));
        }
    }
}
