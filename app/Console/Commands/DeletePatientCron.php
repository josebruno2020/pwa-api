<?php

namespace App\Console\Commands;

use App\Enums\PatientStatusEnum;
use App\Models\PatientStatusHistory;
use App\Services\PatientService;
use App\Services\PatientStatusHistoryService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeletePatientCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patients:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $patientService = new PatientService(
            new PatientStatusHistoryService()
        );

        $patients = $patientService->getAllPatientsByStatus(PatientStatusEnum::HOME, size: 1000);
        $now = Carbon::now()->startOfHour();

        foreach ($patients['data'] as $patient) {
            $patientStatusHistory = PatientStatusHistory::wherePatientId($patient['id'])->orderByDesc('id')->first();
            if (!$patientStatusHistory) continue;



            $statusCreatedAt = Carbon::createFromTimeString($patientStatusHistory->created_at)->startOfHour();

            if ($now->diffInHours($statusCreatedAt) > 1) {
                $patientService->deletePatient($patient['id']);
            }

        }
        return 0;
    }
}
