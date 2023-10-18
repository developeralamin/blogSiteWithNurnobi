<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\EmailInActiveUser;
use Illuminate\Console\Command;

class NotifyInActiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inActivuser = User::where('email', 'test@gmail.com')->first();

        $inActivuser->notify(new EmailInActiveUser($inActivuser));
    }
}
