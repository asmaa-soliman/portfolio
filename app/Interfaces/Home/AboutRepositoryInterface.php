<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface AboutRepositoryInterface
{
    public function aboutpage();
    public function updateabout(Request $reuest);
    public function homeabout();
    public function aboutmultiimage();
    public function storemultiimage(Request $request);
    public function allmultiimage();
    public function editmultiimage($id);
    public function updatemultiimage(Request $request);
    public function deletemultiimage($id);
}

