<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
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



    public function show(int $id): JsonResponse
    {
        $user = $this->userService->getUserById($id);
        return $this->sendData($user);
    }

    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->updateUser($request->validated(), $id);
        return $this->sendData($user);
    }


    public function delete(int $id): JsonResponse
    {
        //TODO delete user;
    }
}
