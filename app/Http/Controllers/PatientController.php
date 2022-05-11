<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
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

    public function index(): JsonResponse
    {
        $patients = $this->patientService->getAllPatients();
        return $this->sendData($patients);
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




    public function update(Request $request, $id)
    {
        //
    }


    public function delete(int $id)
    {
        //
    }
}
