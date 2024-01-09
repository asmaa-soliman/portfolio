<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Home\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }
    public function Contact()
    {
        return $this->contact->Contact();
    }//endmethod
    public function storemessage(Request $request)
    {
        return $this->contact->storemessage($request);
    }//endmethod
    public function contactmessage()
    {
        return $this->contact->contactmessage();
    }//endmethod
    public function deletemessage($id)
    {
        return $this->contact->deletemessage($id);
    }//endmethod


}
