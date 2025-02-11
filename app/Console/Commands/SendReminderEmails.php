<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Console\Command;
use App\Jobs\SendReminderEmailJob;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email 10 minute before the to-do due date and time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $todos = Todo::where('due_time', '=', Carbon::now()->addMinutes(10)->format('Y-m-d H:i:00'))
            ->where('is_email_sent', false)
            ->get();
        
        logger()->info(Carbon::now()->addMinutes(10)->format('Y-m-d H:i:00'));
        // logger()->info($todos);

        foreach ($todos as $todo) {
            // Queue Job Dispatch to send reminder email
            dispatch(new SendReminderEmailJob($todo));
        }
    }
}
