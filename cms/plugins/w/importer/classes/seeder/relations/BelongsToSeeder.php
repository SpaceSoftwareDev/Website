<?php namespace W\Importer\Classes\Seeder\Relations;

class BelongsToSeeder extends RelationSeeder
{
    public function fill()
    {
        $relatedModel = $this->getRelatedModel($this->data);

        $this->relation->setSimpleValue($relatedModel);

        return $this->relation;
    }
}
