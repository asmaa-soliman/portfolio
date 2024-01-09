<?php
namespace App\Interfaces;
use Illuminate\Http\Request;
interface AdminRepositoryInterface
{
    public function destroy(Request $request);
    public function profile();
    public function editprofile();
    public function storeprofile(Request $request);
    public function changepassword();
    public function updatepassword(Request $request);
}
