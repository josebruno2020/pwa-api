<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportCreateRequest;
use App\Http\Requests\ReportUpdateRequest;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorReportController extends Controller
{
    private ReportService $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function create(ReportCreateRequest $request): JsonResponse
    {
        $report = $this->service->createReport($request->validated(), type: 'doctor');
        return $this->sendData($report, Response::HTTP_CREATED);
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $reports = $this->service->getByPatient($patientId, 'doctor');
        return $this->sendData($reports);
    }

    public function update(int $id, ReportUpdateRequest $request): JsonResponse
    {
        $report = $this->service->updateReport($id, $request->validated(), 'doctor');
        return $this->sendData($report);
    }

    public function delete(int $id): JsonResponse
    {
        $this->service->deleteReport($id, 'doctor');
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
