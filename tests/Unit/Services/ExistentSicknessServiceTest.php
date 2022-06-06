<?php

namespace Services;

use App\Models\ExistentSickness;
use App\Models\Patient;
use App\Services\ExistentSicknessService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExistentSicknessServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private ExistentSicknessService $service;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->service = new ExistentSicknessService();
        parent::__construct($name, $data, $dataName);

    }

    protected function setUp(): void
    {
        parent::setUp();
        Patient::factory()->count(1)->create();
    }


    public function testCreateExistentSicknessSuccessfully()
    {
        $data = [
            'patient_id' => Patient::query()->first()->id,
            'sickness' => ['ONE', 'TWO', 'THREE'],
            'others' => $this->faker->text(100)
        ];
        $sickness = $this->service->createSickness($data);

        $this->assertIsArray($sickness);
        $this->assertEquals(
            'ONE,TWO,THREE',
            $sickness['sickness']
        );
        $this->assertDatabaseCount(ExistentSickness::class, 1);
    }
}
