<?php namespace W\Importer\Classes\Seeder\Relations;

class AttachManySeeder extends AttachRelationSeeder
{
    public function fill()
    {
        $this->relation->delete();

        foreach ($this->data as $modelData) {
            $relatedModel = $this->createAttachmentModel($modelData);

            $this->relation->setSimpleValue($relatedModel);
        }

        return $this->relation;
    }
}
