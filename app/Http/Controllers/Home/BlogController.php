<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Home\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;
    public function __construct(BlogRepositoryInterface $blog)
    {
        $this->blog = $blog;
    }
    public function allblog()
    {
        return $this->blog->allblog();
    }//endmethod
    public function addblog()
    {
        return $this->blog->addblog();
    }//endmethod
    public function storeblog(Request $request)
    {
        return $this->blog->storeblog($request);
    }//endmethod
    public function editblog($id)
    {
        return $this->blog->editblog($id);
    }//endmethod
    public function updateblog(Request $request)
    {
        return $this->blog->updateblog($request);
    }//endmethod
    public function deleteblog($id)
    {
        return $this->blog->deleteblog($id);
    }//endmethod
    public function blogdetails($id)
    {
        return $this->blog->blogdetails($id);
    }//endmethod
    public function CategoryBlog($id)
    {
        return $this->blog->CategoryBlog($id);
    }//endmethod
    public function homeblog()
    {
        return $this->blog->homeblog();
    }//endmethod

}
