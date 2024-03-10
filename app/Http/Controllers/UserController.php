<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IUserService;

class UserController extends Controller
{
    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }


    public function addUser(Request $request)
    {
        $user = $this->userService->addUser($request);
        return response()->json($user);
    }


    public function getUser(Request $request)
    {
        $user = $this->userService->getUser($request);
        return response()->json($user);
    }

    public function updateInfo(Request $request)
    {
        $user = $this->userService->updateInfo($request);
        return response()->json($user);
        // return response()->json($request);
    }
}
