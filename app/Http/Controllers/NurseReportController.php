<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportCreateRequest;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NurseReportController extends Controller
{
    private ReportService $nurseReportService;

    public function __construct(ReportService $nurseReportService)
    {
        $this->nurseReportService = $nurseReportService;
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $reports = $this->nurseReportService->getByPatient($patientId, type: 'nurse');
        return $this->sendData($reports);
    }

    public function create(ReportCreateRequest $request): JsonResponse
    {
        $report = $this->nurseReportService->createReport($request->validated(), 'nurse');
        return $this->sendData($report, Response::HTTP_CREATED);
    }
}
