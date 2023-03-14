<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function user()
    {
        $response = auth()->hasUser() ? new UserResource(auth()->user()) : null;

        return response($response, Response::HTTP_CREATED);
    }
}
