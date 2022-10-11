<?php namespace W\Importer\Classes\Seeder\Relations;

class HasManySeeder extends RelationSeeder
{
    public function fill()
    {
        $items = collect();
        foreach ($this->data as $modelData) {
            $relatedModel = $this->getRelatedModel($modelData);
            $items->push($relatedModel);
        }

        $this->relation->setSimpleValue($items);

        return $this->relation;
    }
}
