<?php namespace W\Seeder\Classes\Relations;

class HasOneSeeder extends RelationSeeder
{
    public function fill()
    {
        $relatedModel = $this->getRelatedModel($this->data);

        $this->relation->setSimpleValue($relatedModel);

        return $this->relation;
    }
}
