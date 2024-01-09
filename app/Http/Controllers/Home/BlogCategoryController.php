<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Home\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private $blogcategory;
    public function __construct(BlogCategoryRepositoryInterface $blogcategory)
    {
        $this->blogcategory = $blogcategory;
    }
    public function allblogcategory()
    {
        return $this->blogcategory->allblogcategory();
    }//endmethod
    public function addblogcategory()
    {
        return $this->blogcategory->addblogcategory();
    }//endmethod
    public function storeblogcategory(Request $request)
    {
        return $this->blogcategory->storeblogcategory($request);
    }//endmethod
    public function editblogcategory($id)
    {
        return $this->blogcategory->editblogcategory($id);
    }//endmethod
    public function updateblogcategory(Request $request,$id)
    {
        return $this->blogcategory->updateblogcategory($request,$id);
    }//endmethod
    public function deleteblogcategory($id)
    {
        return $this->blogcategory->deleteblogcategory($id);
    }//endmethod
}
