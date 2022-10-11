<?php namespace W\Seeder\Classes\Relations;

class BelongsToManySeeder extends RelationSeeder
{
    public function fill()
    {
        $items = [];
        foreach ($this->data as $modelData) {
            $relatedModel = $this->getRelatedModel($modelData);

            $items[] = $relatedModel;
        }

        $this->relation->setSimpleValue($items);

        return $this->relation;
    }
}
