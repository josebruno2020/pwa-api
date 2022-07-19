<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStatusHistoryCreateRequest;
use App\Services\PatientStatusHistoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientStatusHistoryController extends Controller
{
    private PatientStatusHistoryService $service;

    public function __construct(PatientStatusHistoryService $service)
    {
        $this->service = $service;
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $statusHistory = $this->service->getByPatient($patientId);
        return $this->sendData($statusHistory);
    }

    public function create(PatientStatusHistoryCreateRequest $request): JsonResponse
    {
        $statusHistory = $this->service->createStatusHistory($request->validated());
        return $this->sendData($statusHistory, Response::HTTP_CREATED);
    }
}
