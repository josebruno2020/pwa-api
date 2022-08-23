<?php

namespace App\Http\Controllers;

use App\Services\ChartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    private ChartService $chartService;

    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function getByPatient(int $patientId): JsonResponse
    {
        $chart = $this->chartService->getByPatient($patientId);
        return $this->sendData($chart);
    }
}
