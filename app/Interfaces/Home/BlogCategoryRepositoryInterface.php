<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface BlogCategoryRepositoryInterface
{
    public function allblogcategory();
    public function addblogcategory();
    public function storeblogcategory(Request $request);
    public function editblogcategory($id);
    public function updateblogcategory(Request $request,$id);
    public function deleteblogcategory($id);
}

