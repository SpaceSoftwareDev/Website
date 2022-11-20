<?php namespace AppSpaceWeb\Newsletter\Http\Controllers;

use Exception;
use Mailjet\Client;
use Mailjet\Resources;
use Illuminate\Routing\Controller;

class NewsletterController extends Controller
{
    public function store()
    {
        request()->validate([
            'email' => 'email|required'
        ]);

        $mj = new Client(env('MJ_APIKEY_PUBLIC'), env('MJ_APIKEY_PRIVATE'),true, [
            'version' => 'v3'
        ]);

        $body = [
            'Action' => 'addforce',
            'Email'  => post('email')
        ];

        $response = $mj->post(Resources::$ContactslistManagecontact, [
            'id'   => env('MJ_CONTACT_LIST_ID'),
            'body' => $body
        ]);

        if (!$response->success()) {
            throw new Exception('Error occurred!');
        }

        return [
            'success' => true
        ];
    }
}
