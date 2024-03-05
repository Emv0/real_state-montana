<?php

namespace App\Mail;

use App\Models\Dating;
use App\Models\Property;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DateMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $property_address, $adviser_name, $hour, $date;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $dating                 = Dating::latest()->first();
        $adviser                = User::where('id', $dating->adviser_id)
                                ->first();
        $property               = Property::where('id', $dating->property_id)
                                ->first();
        $this->property_address = $property->address;
        $this->adviser_name     = $adviser->name;
        $this->hour             = $dating->time;
        $this->date             = $dating->date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("prueba@montana.com", "Inmobiliaria Montana"),
            subject: 'Aviso de cita'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.dateNotification',
            with:[
                'property_address' => $this->property_address,
                'adviser_name'     => $this->adviser_name,
                'hour'             => $this->hour,
                'date'             => $this->date
            ]   
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
