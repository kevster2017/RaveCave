<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::where('id', '>', 0)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'userID' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact->userID = $request->userID;
        $contact->name = $request->name;
        $contact->username = $request->username;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('success', 'Message successfully sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', ['contact' => $contact]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);

        return redirect()->route('contacts.index')->with('success', 'Message successfully deleted');
    }
}
