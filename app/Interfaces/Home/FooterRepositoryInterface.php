<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface FooterRepositoryInterface
{
    public function footersetup();
    public function updatefooter(Request $request);
}

