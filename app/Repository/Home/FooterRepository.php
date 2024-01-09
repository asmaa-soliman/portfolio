<?php
namespace App\Repository\Home;

use App\Interfaces\Home\FooterRepositoryInterface;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterRepository implements FooterRepositoryInterface
{
    public function footersetup()
    {
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all', compact('allfooter'));
    }
    // update
    public function updatefooter(Request $request)
    {
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'adress' => $request->adress,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
        ]);
        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
