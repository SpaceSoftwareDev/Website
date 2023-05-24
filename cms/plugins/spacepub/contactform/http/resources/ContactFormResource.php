<?php namespace SpacePub\ContactForm\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactFormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'email'      => $this->email,
            'name'       => $this->name,
            'message'    => $this->message,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString()
        ];
    }
}
