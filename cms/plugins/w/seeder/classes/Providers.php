<?php namespace W\Seeder\Classes;

class Providers
{
    protected $providers = [];

    public function add($providers)
    {
        if (!is_array($providers)) {
            $providers = [$providers];
        }

        $this->providers = array_merge($this->providers, $providers);
    }

    public function getWorkableProvider($data)
    {
        foreach ($this->providers as $providerClass) {
            if ($providerClass::isWorkable($data)) {
                return new $providerClass($data);
            }
        }

        return null;
    }
}
