<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function user()
    {
        return response(new UserResource(auth()->user()), Response::HTTP_CREATED);
    }
}
