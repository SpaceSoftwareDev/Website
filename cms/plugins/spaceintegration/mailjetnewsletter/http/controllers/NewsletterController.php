<?php namespace SpaceIntegration\MailJetNewsletter\Http\Controllers;

use Illuminate\Routing\Controller;
use SpaceIntegration\MailJetNewsletter\Classes\Services\NewsletterService;

class NewsletterController extends Controller
{
    public function store()
    {
        request()->validate([
            'email' => 'email|required'
        ]);

        NewsletterService::subscribe(post('email'));

        return [
            'success' => true
        ];
    }

    public function destroy()
    {
        request()->validate([
            'email' => 'email|required'
        ]);

        NewsletterService::unsubscribe(post('email'));

        return [
            'success' => true
        ];
    }
}
