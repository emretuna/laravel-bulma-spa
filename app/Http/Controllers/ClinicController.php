<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Http\Requests\ClinicStoreRequest;
use App\Http\Requests\ClinicUpdateRequest;
use App\Http\Resources\Clinic as ClinicResource;
use App\Http\Resources\ClinicCollection;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ClinicCollection
     */
    public function index(Request $request)
    {
        $clinics = Clinic::all();

        return new ClinicCollection($clinics);
    }

    /**
     * @param \App\Http\Requests\ClinicStoreRequest $request
     * @return \App\Http\Resources\Clinic
     */
    public function store(ClinicStoreRequest $request)
    {
        $clinic = Clinic::create($request->all());

        return new ClinicResource($clinic);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Clinic $clinic
     * @return \App\Http\Resources\Clinic
     */
    public function show(Request $request, Clinic $clinic)
    {
        return new ClinicResource($clinic);
    }

    /**
     * @param \App\Http\Requests\ClinicUpdateRequest $request
     * @param \App\Clinic $clinic
     * @return \App\Http\Resources\Clinic
     */
    public function update(ClinicUpdateRequest $request, Clinic $clinic)
    {
        $clinic->update([]);

        return new ClinicResource($clinic);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Clinic $clinic)
    {
        $clinic->delete();

        return response()->noContent(200);
    }
}
