<?php namespace AppSpaceWeb\Newsletter\Http\Controllers;

use AppSpaceWeb\Newsletter\Models\Email;
use Illuminate\Routing\Controller;
use AppSpaceWeb\Newsletter\Http\Resources\NewsletterResource;

class NewsletterController extends Controller
{
    public function store()
    {
        $email = new Email();
        $email->email = post('email');

        $email->save();

        return new NewsletterResource($email);
    }
}
