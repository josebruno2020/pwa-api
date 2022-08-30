<?php

namespace App\Http\Controllers;

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
}
