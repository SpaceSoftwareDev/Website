<?php namespace W\Seeder\Classes\Providers;

abstract class ProviderBase
{
    protected $inputData;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    public abstract function getData();

    public abstract static function isWorkable($inputData);
}
