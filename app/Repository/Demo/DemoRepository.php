<?php

namespace App\Repository\Demo;

use App\Interfaces\Demo\DemoRepositoryInterface;
class DemoRepository implements DemoRepositoryInterface
{
    public function homemain()
    {
        return view('frontend.index');

    }


}
