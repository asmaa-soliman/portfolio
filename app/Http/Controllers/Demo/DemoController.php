<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Interfaces\Demo\DemoRepositoryInterface;


class DemoController extends Controller
{
    private $demo;

    public function __construct(DemoRepositoryInterface $demo)
    {
        $this->demo = $demo;
    }
    public function homemain()
    {
        return $this->demo->homemain();

    }
}
