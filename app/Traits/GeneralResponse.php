<?php

namespace App\Traits;

trait GeneralResponse
{

    public function returnSuccess($statusCode, $message = 'Success', array $data = null)
    {
        $responseData = [
            'status' => true,
            'errorNum' => null,
            'Message' => $message,
        ];

        if ($data) {
            $responseData = array_merge($responseData, $data);
        }

        return response()->json($responseData, $statusCode);
    }

    public function returnError($statusCode, $message)
    {
        return response()->json([
            'status' => false,
            'errorNum' => $statusCode,
            'Message' => $message,
        ], $statusCode);
    }
}
