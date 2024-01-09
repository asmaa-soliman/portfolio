<?php
namespace App\Repository\Home;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use App\Interfaces\Home\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    public function Contact(){
        return view('frontend.contact');
    }
    // store
    public function storemessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',

        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Titile is Required',
        ]);
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // contactmessage
    public function contactmessage()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact',compact('contacts'));

    }
    // delete
    public function deletemessage($id){

     Contact::findOrFail($id)->delete();

     $notification = array(
            'message' => 'Your Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
