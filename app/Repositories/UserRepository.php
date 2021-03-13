<?php
namespace App\Repositories;

use App\Http\Traits\JsonResponses;
use App\Jobs\SendRegistrationSMS;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Helpers\Misc;
use Psy\Util\Str;

class UserRepository{

    use JsonResponses;

    protected $user, $profile, $device, $location;

    public function __construct(User $user, User\Profile $profile, User\Device $device, User\Location $location){
        $this->user = $user;
        $this->profile = $profile;
        $this->device = $device;
        $this->location = $location;
    }

    /**
     * Okay this is lazily implemented i wont lie i did not want to create too many create this that what what functions
     * @param string $function
     * @param array $data
     * @return JsonResponse
     */
    public function create(string $function, array $data): JsonResponse
    {
    try {
        switch ($function) {
            case 'user':
                return $this->create_user($data);
            case 'profile':
                return $this->create_profile($data);
            case 'avatar':
                return $this->create_avatar($data);
        }
    } catch (\Exception $e){
        Log::error($e->getMessage());
        return self::exception('Oops we dunno what happened but something bad did our minions are currently fixing it okay?');
    }
    }


    /**
     * Okay this function explains itself mos nothing fancy bahlali
     * @param array $data
     * @return JsonResponse
     */
    private function create_user(array $data): JsonResponse
    {
        $password = Misc::generate_password();

        DB::transaction(function() use($data, $password){
            $this->user::create([
                'user' => (string)\Illuminate\Support\Str::orderedUuid(),
                'cellphone' => $data['cellphone'],
                'pin' => $password
            ]);
        });

        dispatch(new SendRegistrationSMS($this->user, $password));

        return self::success('Hi, we have successfully registered your new account please wait for an sms containing your password to be sent to you', null);
    }

    private function create_profile(array $data){

    }

    private function create_avatar(array $data){

    }
}
