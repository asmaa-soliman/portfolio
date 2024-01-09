<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface PortfolioRepositoryInterface
{
    public function allportfolio();
    public function addportfolio();
    public function storeportfolio(Request $request);
    public function editportfolio($id);
    public function UpdatePortfolio(Request $request);
    public function deleteportfolio($id);
    public function portfoliodetails($id);
    public function homeportfolio();


}

