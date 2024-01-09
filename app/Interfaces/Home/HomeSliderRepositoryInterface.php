<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface HomeSliderRepositoryInterface
{
    public function homeslider();
    public function updateslider(Request $request);
}

