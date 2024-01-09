<?php
namespace App\Repository\Home;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Interfaces\Home\BlogCategoryRepositoryInterface;
class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function allblogcategory()
    {
        // accesstable frommodel togetcat
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));
    }
    // add
    public function addblogcategory()
    {
        return view('admin.blog_category.blog_category_add');
    }
    // store
    public function storeblogcategory(Request $request)
    {
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // edit
    public function editblogcategory($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogcategory'));
    }
    // update
    public function updateblogcategory(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    // delete
    public function deleteblogcategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
           'message' => 'Blog Category Deleted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
    }
}
