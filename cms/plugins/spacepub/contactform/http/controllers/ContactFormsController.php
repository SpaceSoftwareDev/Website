<?php namespace SpacePub\ContactForm\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use SpacePub\ContactForm\Models\ContactForm;
use SpacePub\ContactForm\Http\Resources\ContactFormResource;

class ContactFormsController extends Controller
{
    public function __invoke()
    {
        return new ContactFormResource(ContactForm::create(Request::all()));
    }
}
