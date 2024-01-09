<?php

namespace App\Http\Controllers;

use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    private $admin;
    public function __construct(AdminRepositoryInterface $admin)
    {
        $this->admin = $admin;
    }
    public function destroy(Request $request)
    {
        return $this->admin->destroy($request);
    }//endmethod
    public function profile()
    {
        return $this->admin->profile();
    }//endmethod
    public function editprofile()
    {
        return $this->admin->editprofile();
    }//endmethod
    public function storeprofile(Request $request)
    {
        return $this->admin->storeprofile($request);
    }//endmethod
    public function changepassword()
    {
        return $this->admin->changepassword();
    }//endmethod
    public function updatepassword(Request $request)
    {
        return $this->admin->updatepassword($request);
    }//endmethod
}
