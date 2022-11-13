<?php namespace AppSpaceWeb\TeamMember\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TeamResource extends Resource
{
    public function toArray($request)
    {
        return [
            'sort_order'        => $this->sort_order,
            'name'              => $this->name,
            'portfolio_link'    => $this->portfolio_link,
            'stack'             => $this->stack,
            'avatar'            => $this->avatar,
        ];
    }
}
