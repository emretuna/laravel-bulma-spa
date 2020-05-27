<?php

namespace Tests\Feature\Http\Controllers;

use App\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DoctorController
 */
class DoctorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $doctors = factory(Doctor::class, 3)->create();

        $response = $this->get(route('doctor.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DoctorController::class,
            'store',
            \App\Http\Requests\DoctorStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $doctor = $this->faker->word;

        $response = $this->post(route('doctor.store'), [
            'doctor' => $doctor,
        ]);

        $doctors = Doctor::query()
            ->where('doctor', $doctor)
            ->get();
        $this->assertCount(1, $doctors);
        $doctor = $doctors->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $doctor = factory(Doctor::class)->create();

        $response = $this->get(route('doctor.show', $doctor));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DoctorController::class,
            'update',
            \App\Http\Requests\DoctorUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $doctor = factory(Doctor::class)->create();
        $doctor = $this->faker->word;

        $response = $this->put(route('doctor.update', $doctor), [
            'doctor' => $doctor,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $doctor = factory(Doctor::class)->create();

        $response = $this->delete(route('doctor.destroy', $doctor));

        $response->assertOk();

        $this->assertDeleted($doctor);
    }
}
