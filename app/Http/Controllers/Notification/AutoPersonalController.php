<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\Notification\AutoPersonalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoPersonalController extends Controller
{
    public function getByPatient(int $patientId): JsonResponse
    {
        $notification = AutoPersonalService::getByPatientId($patientId);
        return $this->sendData($notification);
    }

    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), associative: true);
        $notification = AutoPersonalService::create($data);
        return $this->sendData($notification, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $notification = AutoPersonalService::getById($id);
        return $this->sendData($notification);
    }


    public function update(Request $request, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), associative: true);
        $notification = AutoPersonalService::updateById($id, $data);
        return $this->sendData($notification);
    }

    public function delete(int $id): JsonResponse
    {
        AutoPersonalService::deleteById($id);
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
