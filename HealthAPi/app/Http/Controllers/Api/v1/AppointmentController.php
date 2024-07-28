<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\AppointmentFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\v1\AppointmentCollection;
use App\Http\Resources\v1\AppointmentResource;
use App\Models\Appointment;

class AppointmentController extends Controller
{
 
    public function index(Request $request)
    {
        
        $filter = new AppointmentFilter();
        $filterItems = $filter->transform($request);      
      
        $appoint = Appointment::where($filterItems);       
        return new AppointmentCollection($appoint->paginate());
        
    }

   
    public function store(StoreAppointmentRequest $request)
    {
        return new AppointmentResource(Appointment::create($request->all()));
    }

    public function show(Appointment $appointment)
    {
       
       
        return new AppointmentResource($appointment);
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        return $appointment->update($request->all());
    }
    
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
    }
}
