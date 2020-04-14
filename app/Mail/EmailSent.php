<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Documents;

class EmailSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $document;

    public function __construct(Documents $document)
    {
        $this->document = $document;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->markdown('emails.sent')
                    ->subject($this->document->docType->doc_type.' '.$this->document->no.' ('.$this->document->subject.')')
                    ->attach(public_path('uploads/'.$this->document->filename), [
                        'as' => $this->document->control_no.'.pdf',
                        'mime' => 'application/pdf',
                ]);
    }
}
