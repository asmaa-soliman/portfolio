<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Home\HomeSliderRepositoryInterface;

class HomeSliderController extends Controller
{
    // homeslider get data
    private $homeslider;
    public function __construct(HomeSliderRepositoryInterface $homeslider)
    {
        $this->homeslider = $homeslider;
    }
    public function homeslider()
    {
        return $this->homeslider->homeslider();
    }//endmethod
    public function updateslider(Request $request)
    {
        return $this->homeslider->updateslider($request);
    }//endmethod
}
