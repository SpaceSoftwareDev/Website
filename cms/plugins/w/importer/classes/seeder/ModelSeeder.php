<?php namespace W\Importer\Classes\Seeder;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use October\Rain\Database\ModelException;
use October\Rain\Database\Relations\HasOne;
use October\Rain\Database\Relations\HasMany;
use October\Rain\Database\Relations\AttachOne;
use October\Rain\Database\Relations\BelongsTo;
use October\Rain\Database\Relations\AttachMany;
use October\Rain\Exception\ApplicationException;
use October\Rain\Database\Relations\BelongsToMany;
use W\Importer\Classes\Seeder\Relations\HasOneSeeder;
use W\Importer\Classes\Seeder\Relations\HasManySeeder;
use W\Importer\Classes\Seeder\Relations\AttachOneSeeder;
use W\Importer\Classes\Seeder\Relations\BelongsToSeeder;
use W\Importer\Classes\Seeder\Relations\AttachManySeeder;
use W\Importer\Classes\Seeder\Relations\BelongsToManySeeder;

class ModelSeeder
{
    protected $model;
    protected $data;
    protected $identifier;

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
        } else {
            $this->model->{$attribute} = $value;
        }
    }

    protected function fillRelation($name, $data)
    {
        $relation = $this->model->{$name}();

        if ($relation instanceof BelongsTo) {
            BelongsToSeeder::seed($relation, $data);
        } elseif ($relation instanceof HasOne) {
            HasOneSeeder::seed($relation, $data);
        } elseif ($relation instanceof HasMany) {
            HasManySeeder::seed($relation, $data);
        } elseif ($relation instanceof BelongsToMany) {
            BelongsToManySeeder::seed($relation, $data);
        } elseif ($relation instanceof AttachOne) {
            AttachOneSeeder::seed($relation, $data);
        } elseif ($relation instanceof AttachMany) {
            AttachManySeeder::seed($relation, $data);
        } else {
            throw new ApplicationException('Relation is not supported in seeder');
        }
    }

    public function fill()
    {
        $beforeFill = Event::fire('w.importer.model.beforeFill', [$this->model, &$this->data], true);
        if ($beforeFill !== null) {
            [$this->model, $this->data] = $beforeFill;
        }

        foreach ($this->data as $attribute => $value) {
            if ($this->model->hasRelation($attribute)) {
                $this->fillRelation($attribute, $value);
            } else {
                $this->fillAttribute($attribute, $value);
            }
        }

        Event::fire('w.importer.model.fill', [$this->model, &$this->data]);
    }

    public function fillPivot()
    {
        foreach ($this->data as $attribute => $value) {
            if ($this->model->hasRelation($attribute) && isset($value['pivot'])) {
                $relation = $this->model->{$attribute}();
                BelongsToManySeeder::seedPivot($relation, $value);
            }
        }
    }

    public function save()
    {
        if (Event::fire('w.importer.beforeSave', [$this->model, $this->data], true) === false) {
            return $this->model;
        }

        try {
            $this->model->push();
        } catch (ModelException $exception) {
            $errors = [];
            foreach ($exception->getErrors()->getMessages() as $field => $error) {
                $errors[] = sprintf('%s (%s)', $field, implode(', ', $error));
            }

            throw new Exception(sprintf('Validation errors on fields: %s',
                implode(', ', $errors)
            ));
        }

        return $this->model;
    }

    /**
     * @throws Exception
     */
    public static function seed($modelClass, $data)
    {
        $modelSeeder = new static($modelClass, $data);

        $modelSeeder->fill();
        $modelSeeder->save();
        $modelSeeder->fillPivot();

        return $modelSeeder;
    }
}
