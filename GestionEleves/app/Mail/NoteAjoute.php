<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoteAjoute extends Mailable
{
    use Queueable, SerializesModels;

    public $note;
    public $date;
    public $nom;
    public $prenom;
    public $module;
    public $titre;


    /**
     * Create a new message instance.
     */
    public function __construct($note, $date, $nom, $prenom, $module, $titre)
    {
        $this->note = $note;
        $this->date = $date;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->module = $module;
        $this->titre = $titre;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Note Ajoute',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.note_ajoute',
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
