<?php

namespace App\Http\Controllers;

use App\Http\Requests\VitalSignsCreateRequest;
use App\Services\VitalSignsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VitalSignsController extends Controller
{
    private VitalSignsService $service;

    public function __construct(VitalSignsService $service)
    {
        $this->service = $service;
    }

    public function create(VitalSignsCreateRequest $request): JsonResponse
    {
        $vitalSign = $this->service->createVitalSigns($request->validated());
        return $this->sendData($vitalSign, Response::HTTP_CREATED);
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $vitalSigns = $this->service->getByPatient($patientId);
        return $this->sendData($vitalSigns);
    }
}
