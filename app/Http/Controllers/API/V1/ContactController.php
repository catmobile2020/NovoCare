<?php

namespace App\Http\Controllers\API\V1;

use App\Contact;
use App\Events\ContactStore;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\SendContactEmail;

class ContactController extends Controller
{
    public function store(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:2|max:255|string',
            'email'     => 'required|min:4|email',
            'comment'   => 'required|min:5|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        }

        $contact = $contact->create($request->all());

        event(new ContactStore($contact));
        \Mail::to(env('CONTACT_EMAIL', 'mohamed.hamdy@cat.com.eg'))->send(new SendContactEmail($request->email, $request->name, $request->comment));
        return response()->json([
            'message' => 'E-Mail Send successfully'
        ], 200);
    }
}
