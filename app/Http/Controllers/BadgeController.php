<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Requests\BadgeStoreRequest;
use App\Http\Requests\BadgeUpdateRequest;
use App\Http\Resources\Badge as BadgeResource;
use App\Http\Resources\BadgeCollection;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BadgeCollection
     */
    public function index(Request $request)
    {
        $badges = Badge::all();

        return new BadgeCollection($badges);
    }

    /**
     * @param \App\Http\Requests\BadgeStoreRequest $request
     * @return \App\Http\Resources\Badge
     */
    public function store(BadgeStoreRequest $request)
    {
        $badge = Badge::create($request->all());

        return new BadgeResource($badge);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Badge $badge
     * @return \App\Http\Resources\Badge
     */
    public function show(Request $request, Badge $badge)
    {
        return new BadgeResource($badge);
    }

    /**
     * @param \App\Http\Requests\BadgeUpdateRequest $request
     * @param \App\Badge $badge
     * @return \App\Http\Resources\Badge
     */
    public function update(BadgeUpdateRequest $request, Badge $badge)
    {
        $badge->update([]);

        return new BadgeResource($badge);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Badge $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Badge $badge)
    {
        $badge->delete();

        return response()->noContent(200);
    }
}
