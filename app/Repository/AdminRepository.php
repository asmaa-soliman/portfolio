<?php
namespace App\Repository;

use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminRepositoryInterface
{

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function editprofile(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function storeprofile(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->username=$request->username;
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            // to replace img profile to the same user
            @unlink(public_path('upload/admin_imgs/'.$data->profile_image));
            // createname in db
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_imgs'),$filename);
            $data['profile_image'] = $filename;
         }
         $data->save();
         $notification = array(
             'message' => 'Admin Profile Updated Successfully',
             'alert-type' => 'info'
         );
         return redirect()->route('admin.profile')->with($notification);
    }
    // changepass
    public function changepassword()
    {
        return view('admin.admin_change_password');
    }
    // update pass
    public function updatepassword(Request $request)
    {
        // oldpassword=>from name of input form
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }

    }

}
