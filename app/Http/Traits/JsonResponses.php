<?php
namespace App\Http\Traits;


use Illuminate\Http\JsonResponse;

trait JsonResponses{


    /**
     * Returns http status 422
     * @return int
     */
    public static function unprocessable(): int
    {
        return 422;
    }


    /**
     * Returns http status 401
     * @return int
     */
    public static function unauthorized_status(): int
    {
        return 401;
    }

    /**
     * Returns http status 500
     * @return int
     */
    public static function exception_status(): int
    {
        return 400;
    }


    /**
     *
     * Return unauthorized status with custom message coming from either controllers or services
     * @param string $message
     * @return JsonResponse
     */

    public static function unauthorized(string $message): JsonResponse
    {
        return response()->json(['status' => 'failed', 'message' => $message], self::unauthorized_status());
    }


    /**
     * Returns any successful requests with custom payloads
     * @param string|null $message
     * @param array|null $data
     * @return JsonResponse
     */
    public static function success(?string $message,?array  $data): JsonResponse
    {
        return response()->json(['status' => 'passed', 'message' => $message, 'data' => $data]);
    }

    /**
     * Returns any exception message captured from within the tried and tested try catch thingies either in controllers, services or repositories
     * @param string|null $message
     * @return JsonResponse
     */
    public static function exception(?string $message): JsonResponse
    {
        return response()->json(['status' => 'failed', 'message' => $message], self::exception_status());
    }
}
