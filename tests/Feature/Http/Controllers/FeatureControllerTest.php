<?php

namespace Tests\Feature\Http\Controllers;

use App\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FeatureController
 */
class FeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $features = factory(Feature::class, 3)->create();

        $response = $this->get(route('feature.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeatureController::class,
            'store',
            \App\Http\Requests\FeatureStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $feature = $this->faker->word;

        $response = $this->post(route('feature.store'), [
            'feature' => $feature,
        ]);

        $features = Feature::query()
            ->where('feature', $feature)
            ->get();
        $this->assertCount(1, $features);
        $feature = $features->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $feature = factory(Feature::class)->create();

        $response = $this->get(route('feature.show', $feature));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeatureController::class,
            'update',
            \App\Http\Requests\FeatureUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $feature = factory(Feature::class)->create();
        $feature = $this->faker->word;

        $response = $this->put(route('feature.update', $feature), [
            'feature' => $feature,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $feature = factory(Feature::class)->create();

        $response = $this->delete(route('feature.destroy', $feature));

        $response->assertOk();

        $this->assertDeleted($feature);
    }
}
