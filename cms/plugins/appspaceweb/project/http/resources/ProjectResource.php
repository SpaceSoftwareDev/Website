<?php namespace AppSpaceWeb\Project\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProjectResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'icon'         => $this->icon,
            'gallery'      => $this->gallery,
            'description'  => $this->description
        ];
    }
}
