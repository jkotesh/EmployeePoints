<?php

namespace App\Console\Commands;

use App\AdminUsers;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class cronPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:points';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily points to all users';

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
     * @return mixed
     */
    public function handle()
    {
         $employees = AdminUsers::all();
        foreach ($employees as $user) {
            Mail::raw("{$user->employeeno} -> {$user->total_points}", function ($mail) use ($user) {
                $mail->from('points@points.samuhacreations.com');
                $mail->to($user->email)
                    ->subject('Your Daily Points From Samuha Creations');
            });
        }
 
        $this->info('Your Daily Points From Samuha Creations');
    }
}
