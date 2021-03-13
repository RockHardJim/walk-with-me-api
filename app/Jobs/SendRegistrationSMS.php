<?php

namespace App\Jobs;

use App\Http\Helpers\SMS;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRegistrationSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user, $password;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param $password
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        New SMS('Hi your password for the Walk With Me platform is as follows '. $this->password . ' please keep it safe', $this->user->cellphone);
    }
}
