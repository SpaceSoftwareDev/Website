<?php namespace W\Seeder\Classes;

use Carbon\Carbon;
use October\Rain\Support\Facades\Event;
use October\Rain\Database\Relations\HasOne;
use October\Rain\Database\Relations\HasMany;
use W\Seeder\Classes\Relations\HasOneSeeder;
use W\Seeder\Classes\Relations\HasManySeeder;
use October\Rain\Database\Relations\AttachOne;
use October\Rain\Database\Relations\BelongsTo;
use October\Rain\Database\Relations\AttachMany;
use W\Seeder\Classes\Relations\AttachOneSeeder;
use W\Seeder\Classes\Relations\BelongsToSeeder;
use October\Rain\Exception\ApplicationException;
use W\Seeder\Classes\Relations\AttachManySeeder;
use October\Rain\Database\Relations\BelongsToMany;
use W\Seeder\Classes\Relations\BelongsToManySeeder;

class ModelSeeder
{
    private $model;
    private $data;
    private $identifier;

    public function __construct($model, $data)
    {
        $this->data = $data;
        $this->model = $this->prepareModel($model);
    }

    protected function prepareModel($modelClass)
    {
        $newModel = new $modelClass;

        $modelKey = $newModel->getKeyName();

        if (array_has($this->data, 'slug')) {
            $this->identifier = 'slug';
        }

        if (array_has($this->data, $modelKey)) {
            $this->identifier = $modelKey;
        }

        if ($this->identifier) {
            $existingModel = $modelClass::where($this->identifier, $this->data[$this->identifier])->first();
        }

        return $existingModel ?? $newModel;
    }

    protected function fillAttribute($attribute, $value)
    {
        if (in_array($attribute, $this->model->getDates())) {
            $this->model->attributes[$attribute] = Carbon::parse($value);
        }
        else {
            $this->model->{$attribute} = $value;
        }
    }

    protected function fillRelation($name, $data)
    {
        $relation = $this->model->{$name}();

        if ($relation instanceof BelongsTo) {
            BelongsToSeeder::seed($relation, $data);
        }
        elseif ($relation instanceof HasOne) {
            HasOneSeeder::seed($relation, $data);
        }
        elseif ($relation instanceof HasMany) {
            HasManySeeder::seed($relation, $data);
        }
        elseif ($relation instanceof BelongsToMany) {
            BelongsToManySeeder::seed($relation, $data);
        }
        elseif ($relation instanceof AttachOne) {
            AttachOneSeeder::seed($relation, $data);
        }
        elseif ($relation instanceof AttachMany) {
            AttachManySeeder::seed($relation, $data);
        }
        else {
            throw new ApplicationException('Relation is not supported in seeder');
        }
    }

    public function fill()
    {
        Event::fire('w.seeder.model.beforeFill', [$this->model, $this->data]);

        foreach ($this->data as $attribute => $value) {
            if ($this->model->hasRelation($attribute)) {
                $this->fillRelation($attribute, $value);
            }
            else {
                $this->fillAttribute($attribute, $value);
            }
        }

        Event::fire('w.seeder.model.fill', [$this->model, $this->data]);

        return $this->model;
    }

    public static function seed($model, $data)
    {
        $modelSeeder = new static($model, $data);

        return $modelSeeder->fill();
    }
}
