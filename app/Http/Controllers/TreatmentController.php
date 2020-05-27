<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreatmentStoreRequest;
use App\Http\Requests\TreatmentUpdateRequest;
use App\Http\Resources\Treatment as TreatmentResource;
use App\Http\Resources\TreatmentCollection;
use App\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TreatmentCollection
     */
    public function index(Request $request)
    {
        $treatments = Treatment::all();

        return new TreatmentCollection($treatments);
    }

    /**
     * @param \App\Http\Requests\TreatmentStoreRequest $request
     * @return \App\Http\Resources\Treatment
     */
    public function store(TreatmentStoreRequest $request)
    {
        $treatment = Treatment::create($request->all());

        return new TreatmentResource($treatment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Treatment $treatment
     * @return \App\Http\Resources\Treatment
     */
    public function show(Request $request, Treatment $treatment)
    {
        return new TreatmentResource($treatment);
    }

    /**
     * @param \App\Http\Requests\TreatmentUpdateRequest $request
     * @param \App\Treatment $treatment
     * @return \App\Http\Resources\Treatment
     */
    public function update(TreatmentUpdateRequest $request, Treatment $treatment)
    {
        $treatment->update([]);

        return new TreatmentResource($treatment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Treatment $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Treatment $treatment)
    {
        $treatment->delete();

        return response()->noContent(200);
    }
}
