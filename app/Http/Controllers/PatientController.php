<?php

namespace App\Http\Controllers;

use App\Enums\PatientStatusEnum;
use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientRequest;
use App\Services\PatientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    private PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index(Request $request): JsonResponse
    {
        $status = $request->query->get('status', PatientStatusEnum::OBSERVATION);
        $search = $request->query->get('search', null);
        $page = $request->query->get('page', 1);
        $size = $request->query->get('size', 10);

        if ($search) {
            return $this->sendData(
                $this->patientService->searchPatientsPaginated($search, $page, $size, $status)
            );
        }

        return $this->sendData(
            $this->patientService->getAllPatientsByStatus($status, $page, $size)
        );
    }

    public function search(Request $request): JsonResponse
    {
        $search = $request->query->get('search');
        return $this->sendData(
            $this->patientService->searchPatients($search)
        );
    }

    public function create(PatientCreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $patient = $this->patientService->createPatient($data);

        return $this->sendData(
            $patient,
            Response::HTTP_CREATED
        );
    }

    public function show(int $id): JsonResponse
    {
        $patient = $this->patientService->getPatientById($id);

        return $this->sendData($patient);
    }


    public function update(PatientRequest $request, int $id): JsonResponse
    {
        ['is_choosed' => $isChossedPatient] = $request->validated();
        $patient = $this->patientService->updatePatient($id, $request->validated(), $isChossedPatient);
        return $this->sendData($patient);
    }


    public function delete(int $id)
    {
        $this->patientService->deletePatient($id);
        return $this->sendData('', Response::HTTP_NO_CONTENT);
    }
}
