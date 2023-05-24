<?php namespace SpacePub\ContactForm\Models;

use Mail;
use Model;
use Backend\Models\User;
use Backend\Facades\Backend;

/**
 * ContactForm Model
 */
class ContactForm extends Model
{
    use \October\Rain\Database\Traits\Nullable;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'spacepub_contactform_contact_forms';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'email',
        'name',
        'message',
        'is_done'
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'email'   => [
            'required',
            'email'
        ],
        'name'    => 'required',
        'message' => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'id'      => 'int',
        'is_done' => 'boolean'
    ];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be set as nullable when empty
     */
    protected $nullable = [
        'name',
        'message'
    ];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function afterCreate()
    {
        $vars = [
            'email'   => $this->email,
            'name'    => $this->name,
            'request' => $this->message,
            'url'     => Backend::url('spacepub/contactform/contactforms/update/' . $this->id)
        ];

        if (env('CONTACT_REQUESTS_RECIPIENT')) {
            Mail::send('spacepub.contactform::mail.new-request', $vars, function($message) {
                $message->to(env('CONTACT_REQUESTS_RECIPIENT'));
            });
        } else {
            foreach (User::all() as $user) {
                Mail::sendTo($user->email,'spacepub.contactform::mail.new-request', $vars);
            }
        }
    }
}
