<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExistentSicknessRequest;
use App\Services\ExistentSicknessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExistentSicknessController extends Controller
{
    private ExistentSicknessService $service;

    public function __construct(ExistentSicknessService $service)
    {
        $this->service = $service;
    }

    public function create(ExistentSicknessRequest $request): JsonResponse
    {
        $data = $request->validated();
        $sickness = $this->service->createSickness($data);
        return $this->sendData($sickness, Response::HTTP_CREATED);
    }

    public function find(int $patientId): JsonResponse
    {
        $sickness = $this->service->findByPatient($patientId);
        return $this->sendData($sickness);
    }



}
