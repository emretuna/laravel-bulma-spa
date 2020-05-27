<?php

namespace Tests\Feature\Http\Controllers;

use App\Treatment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TreatmentController
 */
class TreatmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $treatments = factory(Treatment::class, 3)->create();

        $response = $this->get(route('treatment.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TreatmentController::class,
            'store',
            \App\Http\Requests\TreatmentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $treatment = $this->faker->word;

        $response = $this->post(route('treatment.store'), [
            'treatment' => $treatment,
        ]);

        $treatments = Treatment::query()
            ->where('treatment', $treatment)
            ->get();
        $this->assertCount(1, $treatments);
        $treatment = $treatments->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $treatment = factory(Treatment::class)->create();

        $response = $this->get(route('treatment.show', $treatment));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TreatmentController::class,
            'update',
            \App\Http\Requests\TreatmentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $treatment = factory(Treatment::class)->create();
        $treatment = $this->faker->word;

        $response = $this->put(route('treatment.update', $treatment), [
            'treatment' => $treatment,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $treatment = factory(Treatment::class)->create();

        $response = $this->delete(route('treatment.destroy', $treatment));

        $response->assertOk();

        $this->assertDeleted($treatment);
    }
}
