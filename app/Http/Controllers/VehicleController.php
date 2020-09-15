<?php

namespace App\Http\Controllers;

use App\FileModel;
use App\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleModel = new VehicleModel();
	    $vehicles = $vehicleModel->get()->toArray();
	    $fileModel = new FileModel();
	    $data = [];
	    foreach ($vehicles as $index => $value) {
		    $vehicles[$index]['inclusion'] = json_decode($value['inclusion'], TRUE);
		    $file = $fileModel->where('id', $value['vehicle_image_id'])->get()->toArray();
		    $vehicles[$index]['image'] = $file[0]['file_name'];
	    }
	    $data = collect($vehicles);
	    $pagination = $this->customPaginate($data, 10)->setPath('vehicles');
        return view('admin.vehicles.index', ['data' => $pagination]);
    }
	
	public function customPaginate($items, $perPage = null)
	{
		//Get current page form url e.g. &page=1
		if ($perPage == null) {
			$perPage = 10;
		}
		
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		
		//Slice the collection to get the items to display in current page
		$currentPageItems = $items->slice(($currentPage - 1) * $perPage, $perPage);
		
		//Create our paginator and pass it to the view
		return new LengthAwarePaginator($currentPageItems, count($items), $perPage);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $rules = array(
		    'vehicle_name' => 'required',
		    'vehicle_image' => 'required',
		    'vehicle_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()) {
		    return redirect('admin/vehicle/add')->withErrors($validator)->withInput();
	    }
	    else {
	    	if ($request->hasFile('vehicle_image')) {
			    $imageName = $request->file('vehicle_image')->getClientOriginalName();
			    $imageExtension = $request->file('vehicle_image')->getClientOriginalExtension();
			    $imagePath = $imageName;
			    $request->file('vehicle_image')->move(public_path() . '/admin/assets/images/vehicles/', $imageName);
			    if ($imageExtension == 'jpeg' OR $imageExtension == 'png' OR $imageExtension == 'jpg' OR $imageExtension == 'gif' OR $imageExtension == 'svg') {
				    $fileType = 'Image';
			    }
			    $fileId = FileModel::create([
				    'file_name' => $imageName,
				    'file_path' => $imagePath,
				    'file_type' => $fileType
			    ]);
			    $fileId = $fileId->id;
			    $vehicle = new VehicleModel();
			    $vehicle->vehicle_image_id = $fileId;
			    $vehicle->vehicle_name = Input::get('vehicle_name');
			    $vehicle->driver_inclusion = !empty($request->input('driver_inclusion')) AND $request->input('driver_inclusion') == 'on' ? 1 : 0;
			    $vehicle->passenger = !empty($request->input('passenger')) ? Input::get('passenger') : null;
			    $vehicle->door = !empty($request->input('door')) ? Input::get('door') : null;
			    $vehicle->bag = !empty($request->input('bag')) ? Input::get('bag') : null;
			    $vehicle->description = !empty($request->input('description')) ? Input::get('description') : null;
			    $vehicle->inclusion = !empty($request->input('inclusion')) ? json_encode(Input::get('inclusion')) : null;
			    $vehicle->price = !empty($request->input('price')) ? Input::get('price') : null;
			    $vehicle->save();
			    return redirect('admin/vehicles');
		    }
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $vehicleModel = new VehicleModel();
	    $vehicle = $vehicleModel->where('id', $id)->get()->toArray();
	    $vehicle = array_shift($vehicle);
	    $vehicle['inclusion'] = json_decode($vehicle['inclusion'], TRUE);
	    $fileModel = new FileModel();
	    $file = $fileModel->where('id', $vehicle['vehicle_image_id'])->get()->toArray();
	    $vehicle['image_id'] = $file[0]['id'];
	    $vehicle['image'] = $file[0]['file_name'];
	    $data = [];
	    $data = $vehicle;
        return view('admin/vehicles/edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$vehicleModel = new VehicleModel();
	    $vehicle = $vehicleModel->where('id', $id)->update([
	    	'vehicle_image_id' => $request->image_id,
		    'vehicle_name' => $request->vehicle_name,
		    'driver_inclusion' => !empty($request->input('driver_inclusion')) AND $request->input('driver_inclusion') == 'on' ? 1 : 0,
		    'passenger' => !empty($request->input('passenger')) ? Input::get('passenger') : null,
		    'door' => !empty($request->input('door')) ? Input::get('door') : null,
		    'bag' => !empty($request->input('bag')) ? Input::get('bag') : null,
		    'description' => !empty($request->input('description')) ? Input::get('description') : null,
		    'inclusion' => !empty($request->input('inclusion')) ? json_encode(Input::get('inclusion')) : null,
		    'price' => !empty($request->input('price')) ? Input::get('price') : null
	    ]);
	    return redirect('admin/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
