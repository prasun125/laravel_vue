<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CityModel;
use App\CityDistanceTimeModel;
use Illuminate\Pagination\LengthAwarePaginator;

class CityDistanceTimeController extends Controller
{
	public function getDistanceTime() {
		$cityModel = new CityModel();
		$cities = $cityModel->get()->toArray();
		
		$placeId = [];
		$cityId = [];
		
		$cityDistanceTimeModel = new CityDistanceTimeModel();
		
		foreach ($cities as $values) {
			$placeId[] = $values['place_id'];
            $cityId[] = $values['id'];
		}

		for ($i = 0; $i < count($placeId) - 1; $i++) {
			for ($j = $i + 1; $j < count($placeId); $j++) {
				if ($placeId[$i] != $placeId[$j]) {
					$existingNodes = $cityDistanceTimeModel->where('city_from', $cityId[$j])->where('city_to', $cityId[$i])->get()->toArray();
					if(empty($existingNodes)){
                        $existingNodes = $cityDistanceTimeModel->where('city_from', $cityId[$i])->where('city_to', $cityId[$j])->get()->toArray();
                    }
					if (empty($existingNodes)) {
                        $origins['place_id'] = $placeId[$i];
                        $destinations['place_id'] = $placeId[$j];
                        $path = 'https://maps.googleapis.com/maps/api/directions/json?units=metric&';
                        $path = $path . 'origin=place_id:' . $origins['place_id'] . '&' . 'destination=place_id:' . $destinations['place_id']  . '&key=AIzaSyDmlYDmMwu4hdGtV85zSnJJyDrgD6G_4TI&libraries=places';
                        $data = file_get_contents($path);
                        $data = json_decode($data);
                        if(isset($data->status) && $data->status == 'OK'){
                            $cityDistanceTimeModel = new CityDistanceTimeModel();
                            $cityDistanceTimeModel->city_from = $cityId[$i];
                            $cityDistanceTimeModel->city_to = $cityId[$j];
                            $cityDistanceTimeModel->distance = $data->routes[0]->legs[0]->distance->value;
                            $cityDistanceTimeModel->time = $data->routes[0]->legs[0]->duration->value;
                            $cityDistanceTimeModel->save();
                        }

					}
				}
			}
		}
		return redirect('/admin/city-distance-time')->with('status', 'You have successfully updated city\'s distance time');
	}
	
	public function showCityDistanceTime() {
		$cityDistanceTimeModel = new CityDistanceTimeModel();
		$cityDistanceTime = $cityDistanceTimeModel->get()->toArray();
		$city_details = CityModel::select('id', 'city_name')->get()->toArray();

		for($i=0; $i<count($cityDistanceTime); $i++){
		    for($j=0; $j<count($city_details); $j++){
		        if($cityDistanceTime[$i]['city_from'] == $city_details[$j]['id']){
                    $cityDistanceTime[$i]['city_from'] = $city_details[$j]['city_name'];
                }else if($cityDistanceTime[$i]['city_to'] == $city_details[$j]['id']){
                    $cityDistanceTime[$i]['city_to'] = $city_details[$j]['city_name'];
                }
            }
        }

		$data = [];
		$data['cityDistanceTime'] = $cityDistanceTime;
		$data = collect($data['cityDistanceTime']);
		$pagination = $this->customPaginate($data, 10)->setPath('city-distance-time');
		return view('admin.cities.show-city-distance-time', ['data' => $pagination]);
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
}
