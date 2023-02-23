<?php

namespace App\Services;

use App\Models\Patient;
use Facade\FlareClient\Http\Exceptions\NotFound;

class ChartService
{
    private ReportService $reportService;
    private VitalSignsService $vitalSignsService;

    public function __construct(ReportService $reportService, VitalSignsService $vitalSignsService)
    {
        $this->reportService = $reportService;
        $this->vitalSignsService = $vitalSignsService;
    }

    public function getByPatient(int $patientId): array
    {
        $patient = Patient::whereId($patientId)->first();
        if (!$patient) throw new NotFound('Paciente não encontrado');

        $nurseReport = $this->reportService->getByPatient($patientId, 'nurse');
        $doctorReport = $this->reportService->getByPatient($patientId, 'doctor');
        $evolution = $this->reportService->getByPatient($patientId, 'evolution');
        $conduct = $this->reportService->getByPatient($patientId, 'conduct');
        $vitalSigns = $this->vitalSignsService->getByPatient($patientId);

        return [
            'nurseReport' => $nurseReport,
            'doctorReport' => $doctorReport,
            'vitalSigns' => $vitalSigns,
            'evolution' => $evolution,
            'conduct' => $conduct
        ];
    }
}
