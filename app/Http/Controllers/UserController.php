<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        return $this->sendData($users);
    }


    public function create(UserCreateRequest $request): JsonResponse
    {
        $user = $this->userService->createUser($request->validated());
        return $this->sendData($user, Response::HTTP_CREATED);
    }



    public function show(int $id)
    {
        $user = $this->userService->getUserById($id);
        return $this->sendData($user);
    }

    public function update(int $id)
    {

    }


    public function delete(int $id)
    {
        //
    }
}
