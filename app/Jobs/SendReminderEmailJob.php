<?php

namespace App\Jobs;

use App\Models\Todo;
use App\Mail\ReminderEmail;
use App\Services\CSVService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminderEmailJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Todo $todo){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Generate CSV file by using the CSVService
        $csvFileName = CSVService::generateTodoCSV($this->todo);

        // logger()->info("CSV file generated: {$csvFileName}");

        $emailData = [
            'todo' => $this->todo,
            'csvFileName' => $csvFileName,
            'taskUrl' => route('todos.index')
        ];

        // Send the reminder email
        Mail::to($this->todo->user->email)->send(new ReminderEmail($emailData));

        // Mark email as sent
        $this->todo->update(['is_email_sent' => true]);

        logger()->info("Reminder email sent for Todo: {$this->todo->title}");
    }
}
