<?php

namespace App\Mail;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $todo;
    public $csvFileName;
    public $taskUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(public $mailData) {
        $this->todo = $mailData['todo'];
        $this->csvFileName = $mailData['csvFileName'];
        $this->taskUrl = $mailData['taskUrl'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Reminder Email: " . $this->todo->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reminder',
            with: [
                'todo' => $this->todo, 
                'taskUrl' => $this->taskUrl
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
        return [
            Attachment::fromPath(storage_path('app/' . $this->csvFileName)),
        ];
    }
}
