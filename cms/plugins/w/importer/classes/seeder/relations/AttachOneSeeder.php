<?php namespace W\Importer\Classes\Seeder\Relations;

class AttachOneSeeder extends AttachRelationSeeder
{
    public function fill()
    {
        $relatedModel = $this->createAttachmentModel($this->data);

        if (!$relatedModel) {
            $this->relation->delete();
        }
        else {
            $this->relation->setSimpleValue($relatedModel);
        }

        return $this->relation;
    }
}
