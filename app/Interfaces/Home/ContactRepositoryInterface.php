<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface ContactRepositoryInterface
{
    public function Contact();
    public function storemessage(Request $request);
    public function contactmessage();
    public function deletemessage($id);



}

