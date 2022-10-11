<?php namespace W\Importer\Classes\Seeder\Relations;

abstract class RelationSeeder
{
    protected $relation;
    protected $data;

    public function __construct($relation, $data)
    {
        $this->relation = $relation;
        $this->data = $data;
    }

    public abstract function fill();

    public function fillPivot($modelData)
    {
        foreach ($modelData as $column => $data) {
            foreach ($data as $records) {
                foreach ($records as $record) {
                    [$key, $value] = explode('=>', $record);
                    $this->relation->updateExistingPivot(trim($key), [$column => trim($value)]);
                }
            }
        }

        return $this->relation;
    }

    protected function getRelatedModel($data)
    {
        $related = $this->relation->getRelated();

        if (!$data){
            return null;
        }

        $identifier = null;

        if (array_has($data, 'slug')) {
            $identifier = 'slug';
        }

        if (array_has($data, $related->getKeyName())) {
            $identifier = $related->getKeyName();
        }

        return $related->where(array_only($data, [$identifier]))->firstOrFail();
    }

    public static function seed($relation, $data)
    {
        $relationSeeder = new static($relation, $data);
        $relationSeeder->fill();

        return $relationSeeder;
    }

    public static function seedPivot($relation, $data)
    {
        $relationSeeder = new static($relation, $data);
        $relationSeeder->fillPivot($data['pivot']);

        return $relationSeeder;
    }
}
