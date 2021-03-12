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
    //

    protected $authentication;


    public function __construct(AuthenticationService $authenticationService){
        $this->authentication = $authenticationService;
    }

    /**
     * Handles incoming requests appropriately
     * @param Signin $login
     * @return JsonResponse
     */
    public function login(Signin $login): JsonResponse
    {
        return $this->authentication->login($login->only('cellphone', 'password'));
    }

    public function register(Signup $register){

    }
}
