<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\DoctorStoreRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Http\Resources\Doctor as DoctorResource;
use App\Http\Resources\DoctorCollection;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DoctorCollection
     */
    public function index(Request $request)
    {
        $doctors = Doctor::all();

        return new DoctorCollection($doctors);
    }

    /**
     * @param \App\Http\Requests\DoctorStoreRequest $request
     * @return \App\Http\Resources\Doctor
     */
    public function store(DoctorStoreRequest $request)
    {
        $doctor = Doctor::create($request->all());

        return new DoctorResource($doctor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Doctor $doctor
     * @return \App\Http\Resources\Doctor
     */
    public function show(Request $request, Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }

    /**
     * @param \App\Http\Requests\DoctorUpdateRequest $request
     * @param \App\Doctor $doctor
     * @return \App\Http\Resources\Doctor
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        $doctor->update([]);

        return new DoctorResource($doctor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Doctor $doctor)
    {
        $doctor->delete();

        return response()->noContent(200);
    }
}
