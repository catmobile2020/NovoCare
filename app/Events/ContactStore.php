<?php

namespace App\Events;

use App\Contact;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ContactStore
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contact;

    /**
     * Create a new event instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}
