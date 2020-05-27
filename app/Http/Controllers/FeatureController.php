<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Requests\FeatureStoreRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Http\Resources\Feature as FeatureResource;
use App\Http\Resources\FeatureCollection;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FeatureCollection
     */
    public function index(Request $request)
    {
        $features = Feature::all();

        return new FeatureCollection($features);
    }

    /**
     * @param \App\Http\Requests\FeatureStoreRequest $request
     * @return \App\Http\Resources\Feature
     */
    public function store(FeatureStoreRequest $request)
    {
        $feature = Feature::create($request->all());

        return new FeatureResource($feature);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Feature $feature
     * @return \App\Http\Resources\Feature
     */
    public function show(Request $request, Feature $feature)
    {
        return new FeatureResource($feature);
    }

    /**
     * @param \App\Http\Requests\FeatureUpdateRequest $request
     * @param \App\Feature $feature
     * @return \App\Http\Resources\Feature
     */
    public function update(FeatureUpdateRequest $request, Feature $feature)
    {
        $feature->update([]);

        return new FeatureResource($feature);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Feature $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Feature $feature)
    {
        $feature->delete();

        return response()->noContent(200);
    }
}
