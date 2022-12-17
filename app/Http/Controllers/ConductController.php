<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConductCreateRequest;
use App\Http\Requests\ConductUpdateRequest;
use App\Http\Requests\ReportCreateRequest;
use App\Http\Requests\ReportUpdateRequest;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConductController extends Controller
{
    private ReportService $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function create(ConductCreateRequest $request): JsonResponse
    {
        $report = $this->service->createReport($request->validated(), type: 'conduct');
        return $this->sendData($report, Response::HTTP_CREATED);
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $reports = $this->service->getByPatient($patientId, 'conduct');
        return $this->sendData($reports);
    }

    public function update(int $id, ConductUpdateRequest $request): JsonResponse
    {
        $report = $this->service->updateReport($id, $request->validated(), 'conduct');
        return $this->sendData($report);
    }

    public function delete(int $id): JsonResponse
    {
        $this->service->deleteReport($id, 'conduct');
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
