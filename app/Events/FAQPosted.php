<?php

namespace App\Events;

use App\FAQ;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FAQPosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $faq;

    /**
     * Create a new event instance.
     *
     * @param FAQ $faq
     */
    public function __construct(FAQ $faq)
    {
        $this->faq = $faq;
    }
}
