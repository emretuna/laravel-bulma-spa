<?php

namespace Tests\Feature\Http\Controllers;

use App\Badge;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BadgeController
 */
class BadgeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $badges = factory(Badge::class, 3)->create();

        $response = $this->get(route('badge.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BadgeController::class,
            'store',
            \App\Http\Requests\BadgeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $badge = $this->faker->word;

        $response = $this->post(route('badge.store'), [
            'badge' => $badge,
        ]);

        $badges = Badge::query()
            ->where('badge', $badge)
            ->get();
        $this->assertCount(1, $badges);
        $badge = $badges->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $badge = factory(Badge::class)->create();

        $response = $this->get(route('badge.show', $badge));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BadgeController::class,
            'update',
            \App\Http\Requests\BadgeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $badge = factory(Badge::class)->create();
        $badge = $this->faker->word;

        $response = $this->put(route('badge.update', $badge), [
            'badge' => $badge,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $badge = factory(Badge::class)->create();

        $response = $this->delete(route('badge.destroy', $badge));

        $response->assertOk();

        $this->assertDeleted($badge);
    }
}
