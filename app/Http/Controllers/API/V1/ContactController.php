<?php

namespace App\Http\Controllers\API\V1;

use App\Contact;
use App\Events\ContactStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Contact\StoreContactRequest;
use App\Mail\SendContactEmail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request, Contact $contact)
    {
        $validateData = $request->validated();
        $contact = $contact->create($validateData);
        event(new ContactStore($contact));
        \Mail::to('mohamed.hamdy@cat.com.eg')->send(new SendContactEmail($request->email, $request->name, $request->comment));
        return response()->json([
            'message' => 'E-Mail Send successfully'
        ], 200);
    }
}
