<?php

namespace Tests\Feature\Http\Controllers;

use App\Clinic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClinicController
 */
class ClinicControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $clinics = factory(Clinic::class, 3)->create();

        $response = $this->get(route('clinic.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClinicController::class,
            'store',
            \App\Http\Requests\ClinicStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $clinic = $this->faker->word;

        $response = $this->post(route('clinic.store'), [
            'clinic' => $clinic,
        ]);

        $clinics = Clinic::query()
            ->where('clinic', $clinic)
            ->get();
        $this->assertCount(1, $clinics);
        $clinic = $clinics->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $clinic = factory(Clinic::class)->create();

        $response = $this->get(route('clinic.show', $clinic));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClinicController::class,
            'update',
            \App\Http\Requests\ClinicUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $clinic = factory(Clinic::class)->create();
        $clinic = $this->faker->word;

        $response = $this->put(route('clinic.update', $clinic), [
            'clinic' => $clinic,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $clinic = factory(Clinic::class)->create();

        $response = $this->delete(route('clinic.destroy', $clinic));

        $response->assertOk();

        $this->assertDeleted($clinic);
    }
}
