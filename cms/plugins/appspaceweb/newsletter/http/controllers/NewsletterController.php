<?php namespace AppSpaceWeb\Project\Http\Controllers;

use AppSpaceWeb\Newsletter\Models\Email;
use Illuminate\Routing\Controller;
use AppSpaceWeb\Newsletter\Models\Newsletter;
use AppSpaceWeb\Newsletter\Http\Resources\NewsletterResource;

class NewsletterController extends Controller
{
    public function index()
    {
        $email = new Email();
        $email->email = post('email');

        return NewsletterResource::collection(
            Newsletter::isPublished()
                ->post()
        );
    }
}
