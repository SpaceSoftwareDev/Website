<?php namespace SpaceNotification\MailJetNewsletter\Classes\Services;

use Exception;
use Mailjet\Client;
use Mailjet\Resources;
use October\Rain\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ValidationException;

class NewsletterService
{
    public static function subscribe($email)
    {
        $params = [
            'email' => $email
        ];

        $validation = Validator::make($params, [
            'email' => 'email|required'
        ]);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        Event::fire('spacenotification.mailjetnewsletter.beforeSubscribe', [$email]);

        try {
            $mj = new Client(env('MJ_APIKEY_PUBLIC'), env('MJ_APIKEY_PRIVATE'),true, [
                'version' => 'v3'
            ]);

            $body = [
                'Action' => 'addforce',
                'Email'  => $email
            ];

            $mj->post(Resources::$ContactslistManagecontact, [
                'id'   => env('MJ_CONTACT_LIST_ID'),
                'body' => $body
            ]);

            $isSubscribed = true;
        }
        catch (Exception $exception) {
            $isSubscribed = false;
        }

        Event::fire('spacenotification.mailjetnewsletter.afterSubscribe', [$email]);

        return $isSubscribed;
    }

    public static function unsubscribe($email)
    {
        $params = [
            'email' => $email
        ];

        $validation = Validator::make($params, [
            'email' => 'email|required'
        ]);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        Event::fire('spacenotification.mailjetnewsletter.beforeUnsubscribe', [$email]);

        try {
            $mj = new Client(env('MJ_APIKEY_PUBLIC'), env('MJ_APIKEY_PRIVATE'),true, [
                'version' => 'v3'
            ]);

            $body = [
                'Action' => 'unsub',
                'Email'  => $email
            ];

            $mj->post(Resources::$ContactslistManagecontact, [
                'id'   => env('MJ_CONTACT_LIST_ID'),
                'body' => $body
            ]);

            $isUnsubscribed = true;
        }
        catch (Exception $exception) {
            $isUnsubscribed = false;
        }

        Event::fire('spacenotification.mailjetnewsletter.afterUnsubscribe', [$email]);

        return $isUnsubscribed;
    }
}
