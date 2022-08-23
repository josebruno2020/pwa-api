<?php

namespace App\Http\Controllers;

use App\Http\Requests\VitalSignsCreateRequest;
use App\Http\Requests\VitalSignsUpdateRequest;
use App\Services\VitalSignsService;
use Illuminate\Http\JsonResponse;
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

    public function update(int $id, VitalSignsUpdateRequest $request): JsonResponse
    {
        $vitalSign = $this->service->updateVitalSigns($id, $request->validated());
        return $this->sendData($vitalSign);
    }

    public function delete(int $id): JsonResponse
    {
        $this->service->deleteVitalSigns($id);
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
