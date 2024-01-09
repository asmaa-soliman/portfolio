<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Home\FooterRepositoryInterface;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    private $footer;
    public function __construct(FooterRepositoryInterface $footer)
    {
        $this->footer = $footer;
    }
    public function footersetup()
    {
        return $this->footer->footersetup();
    }//endmethod
    public function updatefooter(Request $request)
    {
        return $this->footer->updatefooter($request);
    }//endmethod

}
