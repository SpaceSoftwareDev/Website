<?php namespace W\Seeder\Classes\Providers;

use Illuminate\Support\Facades\File;

class JsonProvider extends ProviderBase
{
    public function getData()
    {
        $content = File::get($this->inputData);

        return json_decode($content, true);
    }

    public static function isWorkable($inputData)
    {
        try{
            $extension = pathinfo($inputData, PATHINFO_EXTENSION);
            
            return $extension === 'json';
        }
        catch (\Exception $exception) {
            return false;
        }
    }
}
