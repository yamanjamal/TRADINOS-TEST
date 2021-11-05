<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use App\Notifications\DeadlineExseedNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class DeadlineExceededCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Deadline:Exceeded';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command that make the task flag 1 that means that the task is finished';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin =User::where('id',1)->first();

        $tasks= Task::where('deadline','<',now())->get();
        
        foreach($tasks as $task){
            $task->update(['end_flag'=>1]);

            Notification::send($admin,new DeadlineExseedNotification($task));

            $taskowner =User::where('id',$task->user_id)->first();
            Notification::send($taskowner,new DeadlineExseedNotification($task));
        }
    }
}
