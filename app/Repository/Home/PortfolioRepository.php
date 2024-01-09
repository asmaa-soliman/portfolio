<?php
namespace App\Repository\Home;

use App\Interfaces\Home\PortfolioRepositoryInterface;
use App\Models\Portfolio;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortfolioRepository implements PortfolioRepositoryInterface
{
     // allallportfolio
     public function allportfolio()
     {
         $portfolio = Portfolio::latest()->get();
         return view('admin.protfolio.protfolio_all', compact('portfolio'));
     }
     // add
     public function addportfolio()
     {
         return view('admin.protfolio.protfolio_add');
     }
     // store
     public function storeportfolio(Request $request)
     {
         $request->validate([
             'portfolio_name' => 'required',
             'portfolio_title' => 'required',
             'portfolio_image' => 'required',

         ], [
             'portfolio_name.required' => 'Portfolio Name is Required',
             'portfolio_title.required' => 'Portfolio Titile is Required',
         ]);
         $image = $request->file('portfolio_image');
         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
         Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
         $save_url = 'upload/portfolio/' . $name_gen;
         Portfolio::insert([
             'portfolio_name' => $request->portfolio_name,
             'portfolio_title' => $request->portfolio_title,
             'portfolio_description' => $request->portfolio_description,
             'portfolio_image' => $save_url,
             'created_at' => Carbon::now(),
         ]);
         $notification = array(
             'message' => 'Portfolio Inserted Successfully',
             'alert-type' => 'success'
         );
         return redirect()->route('all.portfolio')->with($notification);
     }
     // edit
     public function editportfolio($id)
     {
         $portfolio = Portfolio::findOrFail($id);
         return view('admin.protfolio.protfolio_edit', compact('portfolio'));
     }
     // update
     public function UpdatePortfolio(Request $request)
     {
         $portfolio_id = $request->id;
         if ($request->file('portfolio_image')) {
             $image = $request->file('portfolio_image');
             $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
             Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
             $save_url = 'upload/portfolio/' . $name_gen;
             Portfolio::findOrFail($portfolio_id)->update([
                 'portfolio_name' => $request->portfolio_name,
                 'portfolio_title' => $request->portfolio_title,
                 'portfolio_description' => $request->portfolio_description,
                 'portfolio_image' => $save_url,
             ]);
             $notification = array(
                 'message' => 'Portfolio Updated with Image Successfully',
                 'alert-type' => 'success'
             );
             return redirect()->route('all.portfolio')->with($notification);
         } else {
             Portfolio::findOrFail($portfolio_id)->update([
                 'portfolio_name' => $request->portfolio_name,
                 'portfolio_title' => $request->portfolio_title,
                 'portfolio_description' => $request->portfolio_description,
             ]);
             $notification = array(
                 'message' => 'Portfolio Updated without Image Successfully',
                 'alert-type' => 'success'
             );
             return redirect()->route('all.portfolio')->with($notification);
         }
     }
     // delete
     public function deleteportfolio($id)
     {
         $portfolio = Portfolio::findOrFail($id);
         $img = $portfolio->portfolio_image;
         unlink($img);
         Portfolio::findOrFail($id)->delete();
          $notification = array(
             'message' => 'Portfolio Image Deleted Successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
     }
     // diplay datainfrontend
     public function portfoliodetails($id)
     {
         $portfolio = Portfolio::findOrFail($id);
         return view('frontend.protfolio_details',compact('portfolio'));
     }
     // home
     public function homeportfolio()
     {
         $portfolio = Portfolio::latest()->get();
         return view('frontend.portfolio',compact('portfolio'));
     }
}
