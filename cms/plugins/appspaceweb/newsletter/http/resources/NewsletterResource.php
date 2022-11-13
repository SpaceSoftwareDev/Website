<?php namespace AppSpaceWeb\Newsletter\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class NewsletterResource extends Resource
{
    public function toArray($request)
    {
        return [
            'email'        => $this->email,
        ];
    }
}
