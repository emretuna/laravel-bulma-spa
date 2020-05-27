<?php

namespace Tests\Feature\Http\Controllers;

use App\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HotelController
 */
class HotelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $hotels = factory(Hotel::class, 3)->create();

        $response = $this->get(route('hotel.index'));
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelController::class,
            'store',
            \App\Http\Requests\HotelStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $hotel = $this->faker->word;

        $response = $this->post(route('hotel.store'), [
            'hotel' => $hotel,
        ]);

        $hotels = Hotel::query()
            ->where('hotel', $hotel)
            ->get();
        $this->assertCount(1, $hotels);
        $hotel = $hotels->first();
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $hotel = factory(Hotel::class)->create();

        $response = $this->get(route('hotel.show', $hotel));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelController::class,
            'update',
            \App\Http\Requests\HotelUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $hotel = factory(Hotel::class)->create();
        $hotel = $this->faker->word;

        $response = $this->put(route('hotel.update', $hotel), [
            'hotel' => $hotel,
        ]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $hotel = factory(Hotel::class)->create();

        $response = $this->delete(route('hotel.destroy', $hotel));

        $response->assertOk();

        $this->assertDeleted($hotel);
    }
}
