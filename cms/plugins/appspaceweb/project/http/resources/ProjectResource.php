<?php namespace AppSpaceWeb\Project\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProjectResource extends Resource
{
    public function toArray($request)
    {
        $response = [
            'id'           => $this->id,
            'headline'     => $this->headline,
            'title'        => $this->title,
            'gallery'      => $this->gallery,
            'icon'         => $this->icon,
            'description'  => $this->description,
            'is_published' => $this->is_published,
            'created_at'   => $this->created_at->toDateTimeString(),
            'updated_at'   => $this->updated_at->toDateTimeString()
        ];

        return $response;
    }
}