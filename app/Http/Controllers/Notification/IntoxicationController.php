<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\Notification\IntoxicationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IntoxicationController extends Controller
{
    public function getByPatient(int $patientId): JsonResponse
    {
        $notification = IntoxicationService::getByPatientId($patientId);
        return $this->sendData($notification);
    }

    public function show(int $id): JsonResponse
    {
        $notification = IntoxicationService::getById($id);
        return $this->sendData($notification);
    }

    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), associative: true);
        $notification = IntoxicationService::create($data);
        return $this->sendData($notification, Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), associative: true);
        $notification = IntoxicationService::updateById($id, $data);
        return $this->sendData($notification);
    }

    public function delete(int $id): JsonResponse
    {
        IntoxicationService::deleteById($id);
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
