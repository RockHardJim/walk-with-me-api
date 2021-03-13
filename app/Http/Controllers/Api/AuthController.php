<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Signin;
use App\Http\Requests\Auth\Signup;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Yoh i dunno what i smoked but there is some clean shit on this controller damn k0 you killing em son.
    //Side note did yal watch that dumbrega skit video about the covid vaccine?? hilarious shit i tell you

    protected $authentication;


    public function __construct(AuthenticationService $authenticationService){
        $this->authentication = $authenticationService;
    }

    /**
     * Handles incoming login requests appropriately
     * @param Signin $login
     * @return JsonResponse
     */
    public function login(Signin $login): JsonResponse
    {
        return $this->authentication->login($login->only('cellphone', 'password'));
    }


    /**
     * Handles incoming registrations requests appropriately
     * @param Signup $register
     * @return JsonResponse
     */
    public function register(Signup $register): JsonResponse
    {
        return $this->authentication->register($register->only('cellphone'));
    }
}
