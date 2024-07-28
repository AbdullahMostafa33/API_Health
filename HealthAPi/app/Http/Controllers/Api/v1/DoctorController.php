<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\DoctorFilter;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\v1\DoctorCollection;
use App\Http\Resources\v1\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DoctorController extends Controller
{
   public function index(Request $request)
    {
        
        $filter = new DoctorFilter();
        $filterItems = $filter->transform($request);      
      
        $doctor = Doctor::where($filterItems)->Search($request->search);      

        return new DoctorCollection($doctor->paginate());
    }
     public function store(StoreDoctorRequest $request)
    {
        return new DoctorResource(Doctor::create($request->all()));
    }

    
    public function show(Doctor $Doctor)
    {
        $includeAppointments = request()->query('appointments');
        if ($includeAppointments)  return new DoctorResource($Doctor->loadMissing('appointments'));
        return new DoctorResource($Doctor);
    }
 
    public function update(UpdateDoctorRequest $request, Doctor $Doctor)
    {
        return $Doctor->update($request->all());
    }

    
    public function destroy(Doctor $Doctor)
    {
        $Doctor->delete();
    }

    
    


}