<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Home\PortfolioRepositoryInterface;
use Illuminate\Http\Request;


class PortfolioController extends Controller
{
    private $portfolio;
    public function __construct(PortfolioRepositoryInterface $portfolio)
    {
        $this->portfolio = $portfolio;
    }
    public function allportfolio()
    {
        return $this->portfolio->allportfolio();
    } //endmethod
    public function addportfolio()
    {
        return $this->portfolio->addportfolio();
    } //endmethod
    public function storeportfolio(Request $request)
    {
        return $this->portfolio->storeportfolio($request);
    } //endmethod
    public function editportfolio($id)
    {
        return $this->portfolio->editportfolio($id);
    } //endmethod
    public function UpdatePortfolio(Request $request)
    {
        return $this->portfolio->UpdatePortfolio($request);
    } //endmethod
    public function deleteportfolio($id)
    {
        return $this->portfolio->deleteportfolio($id);
    } //endmethod
    public function portfoliodetails($id)
    {
        return $this->portfolio->portfoliodetails($id);
    } //endmethod
    public function homeportfolio()
    {
        return $this->portfolio->homeportfolio();
    } //endmethod

}
