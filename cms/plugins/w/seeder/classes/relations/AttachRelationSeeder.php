<?php namespace W\Seeder\Classes\Relations;

abstract class AttachRelationSeeder extends RelationSeeder
{
    public function createAttachmentModel($data)
    {
        $related = $this->relation->getRelated();
        
        if (!$data) {
            return null;
        }
        
        $relatedModel = new $related;

        if (isset($data['file'])) {
            $relatedModel->fromFile(base_path($data['file']));

            if (isset($data['filename'])) {
                $relatedModel->file_name = $data['filename'];
            }
        } elseif (isset($data['url'])) {
            $relatedModel->fromUrl($data['url'], array_get($data, 'filename'));
        }

        return $relatedModel;
    }
}
