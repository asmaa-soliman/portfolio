<?php
namespace App\Interfaces\Home;
use Illuminate\Http\Request;
interface BlogRepositoryInterface
{
    public function allblog();
    public function addblog();
    public function storeblog(Request $request);
    public function editblog($id);
    public function updateblog(Request $request);
    public function deleteblog($id);
    public function blogdetails($id);
    public function CategoryBlog($id);
    public function homeblog();

}

