<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\MedicineFilter;
use App\Http\Resources\v1\MedicineCollection;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\v1\MedicineResource;

class MedicineController extends Controller
{

    public function index(Request $request)
    {

        $filter = new MedicineFilter();
        $filterItems = $filter->transform($request);

        $medicine = Medicine::where($filterItems)->Search($request->search);  
        return new MedicineCollection($medicine->paginate());
    }


    public function store(StoreMedicineRequest $request)
    {
     
        $image =  $request->file('imageFile');
        if ($image) {
            $name = time() . '.' .$image->extension();
            $destinationPath = public_path('images/medicines');
            $image->move($destinationPath, $name);
            $request['image'] = "medicines/".$name;
        }          
        return new MedicineResource(Medicine::create($request->all()));
    }

    public function show(Medicine $Medicine)
    {
        return new MedicineResource($Medicine);
    }

    public function update(UpdateMedicineRequest $request, Medicine $Medicine)
    {
        return $Medicine->update($request->all());
    }

    public function destroy(Medicine $Medicine)
    {
        $Medicine->delete();
    }
}
