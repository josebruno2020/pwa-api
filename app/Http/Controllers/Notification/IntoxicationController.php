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

    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), associative: true);
        $notification = IntoxicationService::create($data);
        return $this->sendData($notification, Response::HTTP_CREATED);
    }
}
