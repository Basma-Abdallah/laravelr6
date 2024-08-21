<?php
namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function index()
    {
        return view ('task12');
    }
    public function send(Request $request)
    {

        //dd($request);
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send the email
        Mail::to('engbasmamohamad@gmail.com')->send(new ContactUsMail($validatedData));

        return view('task12');
    }
}
