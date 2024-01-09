<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Interfaces\Home\AboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // about get data
    private $about;
    public function __construct(AboutRepositoryInterface $about)
    {
        $this->about = $about;
    }
    public function aboutpage()
    {
        return $this->about->aboutpage();
    }//endmethod
    public function updateabout(Request $request)
    {
        return $this->about->updateabout($request);
    }//endmethod
    public function homeabout()
    {
        return $this->about->homeabout();
    }//endmethod
    public function aboutmultiimage()
    {
        return $this->about->aboutmultiimage();
    }//endmethod
    public function storemultiimage(Request $request)
    {
        return $this->about->storemultiimage($request);
    }//endmethod
    public function allmultiimage()
    {
        return $this->about->allmultiimage();
    }//endmethod
    public function editmultiimage($id)
    {
        return $this->about->editmultiimage($id);
    }//endmethod
    public function updatemultiimage(Request $request)
    {
        return $this->about->updatemultiimage($request);
    }//endmethod
    public function deletemultiimage($id)
    {
        return $this->about->deletemultiimage($id);
    }//endmethod


}
