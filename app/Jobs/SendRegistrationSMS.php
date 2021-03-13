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
use Illuminate\Support\Facades\Log;

class SendRegistrationSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user, $password;

    /**
     * Create a new job instance.
     *
     * @param $cellphone
     * @param $password
     */
    public function __construct($cellphone, $password)
    {
        $this->user = $cellphone;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        New SMS('Hi your password for the Walk With Me platform is as follows '. $this->password . ' please keep it safe', $this->user);
    }
}
