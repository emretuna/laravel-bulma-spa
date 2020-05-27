<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Http\Resources\Hotel as HotelResource;
use App\Http\Resources\HotelCollection;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\HotelCollection
     */
    public function index(Request $request)
    {
        $hotels = Hotel::all();

        return new HotelCollection($hotels);
    }

    /**
     * @param \App\Http\Requests\HotelStoreRequest $request
     * @return \App\Http\Resources\Hotel
     */
    public function store(HotelStoreRequest $request)
    {
        $hotel = Hotel::create($request->all());

        return new HotelResource($hotel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Hotel $hotel
     * @return \App\Http\Resources\Hotel
     */
    public function show(Request $request, Hotel $hotel)
    {
        return new HotelResource($hotel);
    }

    /**
     * @param \App\Http\Requests\HotelUpdateRequest $request
     * @param \App\Hotel $hotel
     * @return \App\Http\Resources\Hotel
     */
    public function update(HotelUpdateRequest $request, Hotel $hotel)
    {
        $hotel->update([]);

        return new HotelResource($hotel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hotel $hotel)
    {
        $hotel->delete();

        return response()->noContent(200);
    }
}
