<?php namespace AppSpaceWeb\TeamMember\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TeamResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'avatar'         => $this->avatar,
            'stack'          => $this->stack,
            'portfolio_link' => $this->portfolio_link
        ];
    }
}
