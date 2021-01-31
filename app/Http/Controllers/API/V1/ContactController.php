<?php

namespace App\Http\Controllers\API\V1;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Contact\StoreContactRequest;
use App\Mail\SendContactEmail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request, Contact $contact)
    {
        if ($contact->create($request->only('name', 'email', 'comment')))
        \Mail::to('mohamed.hamdy@cat.com.eg')->send(new SendContactEmail($request->email, $request->name, $request->comment));
        return response()->json([
            'message' => 'E-Mail Send successfully'
        ], 200);
    }
}
