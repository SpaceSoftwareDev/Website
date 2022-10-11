<?php namespace W\Seeder\Classes;

use Exception;
use Illuminate\Support\Facades\Event;
use October\Rain\Database\ModelException;
use W\Seeder\Facades\SeederProviders;

class Seeder
{
    private $model;
    private $inputData;
    private $provider;
    private $providers;

    public function __construct($model, $inputData)
    {
        $this->model = $model;
        $this->inputData = $inputData;
        $this->providers = SeederProviders::getFacadeRoot();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
    }

    public function resolveProvider()
    {
        $this->provider = $this->providers->getWorkableProvider($this->inputData);
    }

    public function getProvider()
    {
        if (!$this->provider) {
            $this->resolveProvider();
        }

        return $this->provider;
    }

    public static function seed($model, $inputData)
    {
        $processedModels = collect();

        try {
            $seeder = new static($model, $inputData);

            $provider = $seeder->getProvider();

            if (!$provider) {
                throw new Exception('Format not supported');
            }

            $data = $provider->getData($seeder->inputData);

            if (is_array($data) && array_values($data) !== $data) {
                $data = [$data];
            }

            $beforeSeed = Event::fire('w.seeder.beforeSeed', [$seeder, $data], true);
            if ($beforeSeed !== null) {
                $data = $beforeSeed;
            }

            foreach ($data as $modelData) {
                $model = ModelSeeder::seed($seeder->model, $modelData);
                
                if (Event::fire('w.seeder.beforeSave', [$model, $modelData], true) === false) {
                    continue;
                }
                
                $model->push();

                $processedModels->push($model);
            }

            Event::fire('w.seeder.seed', [$seeder, $processedModels]);
        } catch (ModelException $exception) {
            $errors = [];
            foreach ($exception->getErrors()->getMessages() as $field => $error) {
                $errors[] = sprintf('%s (%s)', $field, implode(', ', $error));
            }

            throw new Exception(sprintf('Validation errors in %s model on fields: %s',
                get_class($exception->getModel()),
                implode(', ', $errors)
            ));
        } catch (Exception $exception) {
            throw new Exception(sprintf('Model: %s Error: %s', class_basename($model), $exception->getMessage()));
        }

        return $processedModels;
    }
}
