<?php
namespace App\Services;


use App\Http\Traits\JsonResponses;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationService{

    use JsonResponses;

    protected $user;

    public function  __construct(User $user){
        $this->$user = $user;
    }


    /**
     * Logs a user into the system and dispatches a sanctum bearer token
     * @param array $details
     * @return JsonResponse
     */
    public function login(array $details): JsonResponse
    {
        if(Auth::attempt($details)){
            return self::success('Hi, we have successfully logged you in please wait while we redirect you', array('token' => $this->user->createToken(‘authToken’)->plainTextToken));
        }

        return self::unauthorized('Hi you have entered incorrect login credentials as such cannot log you in');
    }
}
