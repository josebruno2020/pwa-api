<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportCreateRequest;
use App\Http\Requests\ReportUpdateRequest;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NurseEvolutionController extends Controller
{
    private ReportService $nurseReportService;

    public function __construct(ReportService $nurseReportService)
    {
        $this->nurseReportService = $nurseReportService;
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $reports = $this->nurseReportService->getByPatient($patientId, type: 'evolution');
        return $this->sendData($reports);
    }

    public function create(ReportCreateRequest $request): JsonResponse
    {
        $report = $this->nurseReportService->createReport($request->validated(), 'evolution');
        return $this->sendData($report, Response::HTTP_CREATED);
    }

    public function update(int $id, ReportUpdateRequest $request): JsonResponse
    {
        $report = $this->nurseReportService->updateReport($id, $request->validated(), 'evolution');
        return $this->sendData($report);
    }

    public function delete(int $id): JsonResponse
    {
        $this->nurseReportService->deleteReport($id, 'evolution');
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
