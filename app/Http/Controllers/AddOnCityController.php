<?php

namespace App\Http\Controllers;

use App\AddOnCityModel;
use App\CityDistanceTimeModel;
use App\CityImageModel;
use App\CityModel;
use App\FileModel;
use Illuminate\Http\Request;

class AddOnCityController extends Controller
{
	public function showAddOnCities(){

		$city_distance_details = CityDistanceTimeModel::select('id', 'city_to', 'city_from', 'distance')->get()->toArray();
		$city_details = CityModel::select('id', 'place_id')->get()->toArray();
		foreach($city_details as $key=>$value){
			$data[$value['id']]['place_id'] = $value['id'];
		}
		
		$addOnCityModel = new AddOnCityModel();
		$addOnCities = $addOnCityModel->max('city_distance_table_id');
		
		foreach($city_distance_details as $key=>$value){
		    if($value['id'] >= $addOnCities) {


                $origin_id = $value['city_to'];
                $destination_id = $value['city_from'];
                $counter = 0;
                foreach ($data as $k => $v) {
                    if ($k != $value['city_from'] && $k != $value['city_to']) {
                        $check_add_on1 = AddOnCityModel::where('city_distance_table_id', $value['id'])->where('city_id', $k)->get()->toArray();
                        if (empty($check_add_on1)) {

                            //Origin to addon distance
                            $origin_to_addon_distance = 0;
                            $origin_to_addon = CityDistanceTimeModel::where('city_from', '=', $origin_id)->where('city_to', '=', $v['place_id'])->get()->toArray();
                            if (empty($origin_to_addon)) {
                                $origin_to_addon = CityDistanceTimeModel::where('city_from', '=', $v['place_id'])->where('city_to', '=', $origin_id)->get()->toArray();
                            }
                            if (!empty($origin_to_addon)) {
                                $origin_to_addon_distance = $origin_to_addon[0]['distance'];
                                //Destination to Origin
                                $destination_to_addon_distance = 0;
                                $destination_to_addon = CityDistanceTimeModel::where('city_from', '=', $destination_id)->where('city_to', '=', $v['place_id'])->get()->toArray();
                                if (empty($destination_to_addon)) {
                                    $destination_to_addon = CityDistanceTimeModel::where('city_from', '=', $v['place_id'])->where('city_to', '=', $destination_id)->get()->toArray();
                                }
                                if (!empty($destination_to_addon)) {


                                    $destination_to_addon_distance = $destination_to_addon[0]['distance'];

                                    $addon_distance = $origin_to_addon_distance + $destination_to_addon_distance;
                                    if (($addon_distance - $value['distance']) < 30000) {
                                        $add_on_cities[$counter]['city_distance_table_id'] = $value['id'];
                                        $add_on_cities[$counter]['city_id'] = $k;
                                        $add_on_city_model = new AddOnCityModel();
                                        $add_on_city_model->city_distance_table_id = $add_on_cities[$counter]['city_distance_table_id'];
                                        $add_on_city_model->city_id = $add_on_cities[$counter]['city_id'];
                                        $add_on_city_model->save();
                                        $counter++;
                                    }
                                }
                            }
                        }
                    }
                }
            }


		}
		return redirect('/admin/add-on-cities');


	}

    public function displayAddOnCities(){
        $data = AddOnCityModel::join('tp_cities', 'tp_cities.id', '=', 'tp_addon_cities.city_id')->paginate(10)->setPath('add-on-cities');
        return view('admin.cities.add-on-cities', ['data'=>$data]);
    }

    /*public function fetchFirstAddonCity($previousCityId, $currentCityId) {
		$index = 0;
	    $addOnCities = [];
	    $distance = 0;
	    if ((int)$previousCityId != (int)$currentCityId) {
		    // Calculate distance between these two city ids
		    $distance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$currentCityId]])->get()->toArray();
		    if (empty($distance)) {
			    $distance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$currentCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		    }
	    }
	    $addonCityFromPrev = CityDistanceTimeModel::where('city_from', (int)$previousCityId)->orderBy('distance', 'ASC')->get()->toArray();
	    if ($previousCityId == $currentCityId) {
	    	foreach ($addonCityFromPrev as $key => $value) {
	    		// Calculate A - x - B distance
			    $axbTotalDistance = $value["distance"] + $value["distance"];
			    if ($axbTotalDistance < 200000 OR ($axbTotalDistance < 600000 AND ($axbTotalDistance - $distance < 50000))) {
				    $cityDetails = CityModel::where('id', $value["city_to"])->get()->toArray();
				    if (!empty($cityDetails)) {
					    $addOnCities[$index] = $cityDetails[0];
					    $addOnCities[$index]['prevDistance'] = $value["distance"];
					    $addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$value["time"]);
					    $addOnCities[$index]['currDistance'] = $value["distance"];
					    $addOnCities[$index]['currTime'] = $this->secondsToWords((int)$value["time"]);
					    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
					    if (!empty($cityImageId)) {
						    $cityImageId = $cityImageId[0]['city_image_file_id'];
						    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
						    if (!empty($imageFile)) {
							    $addOnCities[$index]['image_id'] = $cityImageId;
							    $addOnCities[$index]['image'] = $imageFile[0]['file_name'];
						    }
					    }
					    $index++;
				    }
			    }
		    }
	    }
	    else {
		    foreach ($addonCityFromPrev as $key => $value) {
		    	$xbDistance = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$currentCityId]])->orderBy('distance', 'ASC')->get()->toArray();
			    if (empty($xbDistance)) {
				    $xbDistance = CityDistanceTimeModel::where([['city_from', $currentCityId], ['city_to', (int)(int)$value["city_to"]]])->orderBy('distance', 'ASC')->get()->toArray();
			    }
			    if (!empty($xbDistance)) {
				    // Calculate A - x - B distance
				    $axbTotalDistance = $value["distance"] + $xbDistance[0]["distance"];
				    if (!empty($distance) AND $distance[0]["distance"] < 200000) {
					    if ($axbTotalDistance < 200000 OR ($axbTotalDistance < 600000 AND ($axbTotalDistance - $distance[0]["distance"] < 50000))) {
						    $cityDetails = CityModel::where('id', $value["city_to"])->get()->toArray();
						    if (!empty($cityDetails)) {
							    $addOnCities[$index] = $cityDetails[0];
							    $addOnCities[$index]['prevDistance'] = $value["distance"];
							    $addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$value["time"]);
							    $addOnCities[$index]['currDistance'] = $xbDistance[0]["distance"];
							    $addOnCities[$index]['currTime'] = $this->secondsToWords((int)$xbDistance[0]["time"]);
							    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
							    if (!empty($cityImageId)) {
								    $cityImageId = $cityImageId[0]['city_image_file_id'];
								    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
								    if (!empty($imageFile)) {
									    $addOnCities[$index]['image_id'] = $cityImageId;
									    $addOnCities[$index]['image'] = $imageFile[0]['file_name'];
								    }
							    }
							    $index++;
						    }
					    }
				    }
				    elseif (!empty($distance) AND $distance[0]["distance"] > 200000 AND $distance[0]["distance"] < 600000) {
					    if ($axbTotalDistance < 200000 OR ($axbTotalDistance < 600000 AND ($axbTotalDistance - $distance[0]["distance"] < 50000))) {
						    $cityDetails = CityModel::where('id', $value["city_to"])->get()->toArray();
						    if (!empty($cityDetails)) {
							    $addOnCities[$index] = $cityDetails[0];
							    $addOnCities[$index]['prevDistance'] = $value["distance"];
							    $addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$value["time"]);
							    $addOnCities[$index]['currDistance'] = $xbDistance[0]["distance"];
							    $addOnCities[$index]['currTime'] = $this->secondsToWords((int)$xbDistance[0]["time"]);
							    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
							    if (!empty($cityImageId)) {
								    $cityImageId = $cityImageId[0]['city_image_file_id'];
								    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
								    if (!empty($imageFile)) {
									    $addOnCities[$index]['image_id'] = $cityImageId;
									    $addOnCities[$index]['image'] = $imageFile[0]['file_name'];
								    }
							    }
							    $index++;
						    }
					    }
				    }
			    }
		    }
	    }
	    if (!empty($addOnCities)) {
		    $addOnCities = $this->sortAddonCities($addOnCities);
		    return response()->json(['add_on_cities' => $addOnCities]);
	    }
	    else {
		    return response()->json('error');
	    }
    }*/
	
	public function fetchFirstAddonCity($previousCityId, $currentCityId) {
		$index = 0;
		$addOnCities = [];
		$abDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$currentCityId]])->get()->toArray();
		if (empty($abDistance)) {
			$abDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$currentCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		}
		if (!empty($abDistance)) {
			$abDistance = array_shift($abDistance);
			$expectedAddonDistance = CityDistanceTimeModel::where('city_from', (int)$previousCityId)->orderBy('distance', 'ASC')->get()->toArray();
			if (!empty($expectedAddonDistance)) {
				foreach ($expectedAddonDistance as $key => $value) {
					$xbDistance = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$currentCityId]])->get()->toArray();
					if (empty($xbDistance)) {
						$xbDistance = CityDistanceTimeModel::where([['city_from', (int)$currentCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
					}
					if (!empty($xbDistance)) {
						$xbDistance = array_shift($xbDistance);
						$axbTotalDistance = $value["distance"] + $xbDistance["distance"];
						if ((($axbTotalDistance - $abDistance["distance"]) < 50000) AND ((($abDistance["distance"] < 200000) AND ($axbTotalDistance < 200000)) OR (($abDistance["distance"] > 200000) AND ($abDistance["distance"] < 600000) AND ($axbTotalDistance < 600000)))) {
							$cityDetails = CityModel::where('id', (int)$value["city_to"])->get()->toArray();
							if (!empty($cityDetails)) {
								$cityDetails = array_shift($cityDetails);
								$addOnCities[$index] = $cityDetails;
								$addOnCities[$index]['prevDistance'] = $value["distance"];
								$addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$value["time"]);
								$addOnCities[$index]['currDistance'] = $xbDistance["distance"];
								$addOnCities[$index]['currTime'] = $this->secondsToWords((int)$xbDistance["time"]);
								$cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
								if (!empty($cityImageId)) {
									$cityImageId = $cityImageId[0]['city_image_file_id'];
									$imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
									if (!empty($imageFile)) {
										$addOnCities[$index]['image_id'] = $cityImageId;
										$addOnCities[$index]['image'] = $imageFile[0]['file_name'];
									}
								}
								$index++;
							}
						}
					}
				}
			}
		}
		if (!empty($addOnCities)) {
			$addOnCities = $this->sortAddonCities($addOnCities);
			return response()->json(['add_on_cities' => $addOnCities]);
		}
		else {
			return response()->json('error');
		}
	}
	
    /*public function fetchSecondAddonCity($previousCityId, $currentCityId, $firstAddonCityId) {
	    $index = 0;
	    $addOnCities = [];
	    $distancePrevCurrCity = 0;
	    if ((int)$previousCityId != (int)$currentCityId) {
		    // Calculate distance between these two city ids (A - B)
		    $distancePrevCurrCity = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$currentCityId]])->get()->toArray();
		    if (empty($distancePrevCurrCity)) {
			    $distancePrevCurrCity = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$currentCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		    }
	    }
	
	    // Calculate distance between previous city id and first addon city id (A - x)
	    $distancePrevFirstAddonCity = CityDistanceTimeModel::where([['city_from', (int)$previousCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
	    if (empty($distancePrevFirstAddonCity)) {
		    $distancePrevFirstAddonCity = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
	    }
	    
	    // Calculate (x - y)
	    $dataFirstSecondAddonCity = CityDistanceTimeModel::where('city_from', (int)$firstAddonCityId)->orderBy('distance', 'ASC')->get()->toArray();
	    if (empty($dataFirstSecondAddonCity)) {
		    $dataFirstSecondAddonCity = CityDistanceTimeModel::where('city_to', (int)$firstAddonCityId)->orderBy('distance', 'ASC')->get()->toArray();
	    }
	    foreach ($dataFirstSecondAddonCity as $key => $value) {
	    	// (x - y)
		
		    $dataXY = CityDistanceTimeModel::where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
		    if (empty($dataXY)) {
			    $dataXY = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
		    }
		    
		    // (y - B)
		    $dataSecondAddonCurrCity = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$currentCityId]])->get()->toArray();
		    if (empty($dataSecondAddonCurrCity)) {
			    $dataSecondAddonCurrCity = CityDistanceTimeModel::where([['city_from', (int)$currentCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
		    }
		    
		    // (A - y)
		    $dataPrevSecondAddonCity = CityDistanceTimeModel::where([['city_from', (int)$previousCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
		    if (empty($dataPrevSecondAddonCity)) {
			    $dataPrevSecondAddonCity = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$previousCityId]])->get()->toArray();
		    }
		    
		    // (A - x)
		    $axDistance = CityDistanceTimeModel::where([['city_from', (int)$previousCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
		    if (empty($axDistance)) {
			    $axDistance = CityDistanceTimeModel::where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		    }
		    
		    // (A - x - y - B)
		    $axybTotalDistance = $axDistance[0]["distance"] + $dataXY[0]["distance"] + $dataSecondAddonCurrCity[0]["distance"];
		    
		    // (A - y - B)
		    $aybTotalDistance = $dataPrevSecondAddonCity[0]["distance"] + $dataSecondAddonCurrCity[0]["distance"];
		    
		    if ($axybTotalDistance < 200000 OR ($axybTotalDistance > 200000 AND $axybTotalDistance < 600000 AND ($aybTotalDistance - $distancePrevCurrCity[0]["distance"]) < 50000)) {
			    $cityDetails = CityModel::where('id', $value["city_to"])->get()->toArray();
			    if (!empty($cityDetails)) {
				    $addOnCities[$index] = $cityDetails[0];
				    // x - y distance and time
				    $addOnCities[$index]['prevDistance'] = $dataXY[0]["distance"];
				    $addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$dataXY[0]["time"]);
				    // y - B distance and time
				    $addOnCities[$index]['currDistance'] = $dataSecondAddonCurrCity[0]["distance"];
				    $addOnCities[$index]['currTime'] = $this->secondsToWords((int)$dataSecondAddonCurrCity[0]["time"]);
				    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
				    if (!empty($cityImageId)) {
					    $cityImageId = $cityImageId[0]['city_image_file_id'];
					    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
					    if (!empty($imageFile)) {
						    $addOnCities[$index]['image_id'] = $cityImageId;
						    $addOnCities[$index]['image'] = $imageFile[0]['file_name'];
					    }
				    }
				    $index++;
			    }
		    }
	    }
	    if (!empty($addOnCities)) {
		    $addOnCities = $this->sortAddonCities($addOnCities);
		    return response()->json(['add_on_cities' => $addOnCities]);
	    }
	    else {
		    return response()->json('error');
	    }
    }*/
    
    public function fetchSecondAddonCity($previousCityId, $currentCityId, $firstAddonCityId) {
	    $index = 0;
	    $addOnCities = [];
	    $abDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$currentCityId]])->get()->toArray();
	    if (empty($abDistance)) {
		    $abDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$currentCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
	    }
	    if (!empty($abDistance)) {
		    $abDistance = array_shift($abDistance);
		    $axDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
		    if (empty($axDistance)) {
			    $axDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		    }
		    if (!empty($axDistance)) {
			    $axDistance = array_shift($axDistance);
			    $xbDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$currentCityId]])->get()->toArray();
			    if (empty($xbDistance)) {
				    $xbDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$currentCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
			    }
			    if (!empty($xbDistance)) {
				    $xbDistance = array_shift($xbDistance);
				    $expectedAddonDistance = CityDistanceTimeModel::where('city_from', (int)$firstAddonCityId)->orderBy('distance', 'ASC')->get()->toArray();
				    if (!empty($expectedAddonDistance)) {
					    foreach ($expectedAddonDistance as $key => $value) {
						    $ayDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$previousCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
						    if (empty($ayDistance)) {
							    $ayDistance = CityDistanceTimeModel::select('id', 'distance')->where([['city_from', (int)$value["city_to"]], ['city_to', (int)$previousCityId]])->get()->toArray();
						    }
						    if (!empty($ayDistance)) {
							    $ayDistance = array_shift($ayDistance);
							    $ybDistance = CityDistanceTimeModel::where([['city_from', (int)$value["city_to"]], ['city_to', (int)$currentCityId]])->get()->toArray();
							    if (empty($ybDistance)) {
								    $ybDistance = CityDistanceTimeModel::where([['city_from', (int)$currentCityId], ['city_to', (int)$value["city_to"]]])->get()->toArray();
							    }
							    if (!empty($ybDistance)) {
								    $ybDistance = array_shift($ybDistance);
								    $axybTotalDistance = $axDistance["distance"] + $value["distance"] + $ybDistance["distance"];
								    $aybTotalDistance = $ayDistance["distance"] + $ybDistance["distance"];
								    if ((($aybTotalDistance - $abDistance["distance"]) < 50000) AND ((($abDistance["distance"] < 200000) AND ($axybTotalDistance < 200000)) OR (($abDistance["distance"] > 200000) AND ($abDistance["distance"] < 600000) AND ($axybTotalDistance < 600000)))) {
									    $cityDetails = CityModel::where('id', (int)$value["city_to"])->get()->toArray();
									    if (!empty($cityDetails)) {
										    $cityDetails = array_shift($cityDetails);
										    $addOnCities[$index] = $cityDetails;
										    $addOnCities[$index]['prevDistance'] = $value["distance"];
										    $addOnCities[$index]['prevTime'] = $this->secondsToWords((int)$value["time"]);
										    $addOnCities[$index]['currDistance'] = $ybDistance["distance"];
										    $addOnCities[$index]['currTime'] = $this->secondsToWords((int)$ybDistance["time"]);
										    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
										    if (!empty($cityImageId)) {
											    $cityImageId = $cityImageId[0]['city_image_file_id'];
											    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
											    if (!empty($imageFile)) {
												    $addOnCities[$index]['image_id'] = $cityImageId;
												    $addOnCities[$index]['image'] = $imageFile[0]['file_name'];
											    }
										    }
										    $index++;
									    }
								    }
							    }
						    }
					    }
				    }
			    }
		    }
	    }
	    if (!empty($addOnCities)) {
		    $addOnCities = $this->sortAddonCities($addOnCities);
		    return response()->json(['add_on_cities' => $addOnCities]);
	    }
	    else {
		    return response()->json('error');
	    }
    }
    
    public function fetchFirstMiddleAddonCity($cityId) {
	    $myIndex = 0;
	    $firstMiddleAddOnCities = [];
	    $expectedMiddleAddonDistance = CityDistanceTimeModel::where('city_from', (int)$cityId)->orderBy('distance', 'ASC')->get()->toArray();
	    if (!empty($expectedMiddleAddonDistance)) {
	    	foreach ($expectedMiddleAddonDistance as $index => $value) {
	    		if ($value["distance"] <= 200000) {
				    $cityDetails = CityModel::where('id', (int)$value["city_to"])->get()->toArray();
				    if (!empty($cityDetails)) {
					    $cityDetails = array_shift($cityDetails);
					    $firstMiddleAddOnCities[$myIndex] = $cityDetails;
					    $firstMiddleAddOnCities[$myIndex]['prevDistance'] = $value["distance"];
					    $firstMiddleAddOnCities[$myIndex]['prevTime'] = $this->secondsToWords((int)$value["time"]);
					    $firstMiddleAddOnCities[$myIndex]['currDistance'] = $value["distance"];
					    $firstMiddleAddOnCities[$myIndex]['currTime'] = $this->secondsToWords((int)$value["time"]);
					    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
					    if (!empty($cityImageId)) {
						    $cityImageId = $cityImageId[0]['city_image_file_id'];
						    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
						    if (!empty($imageFile)) {
							    $firstMiddleAddOnCities[$myIndex]['image_id'] = $cityImageId;
							    $firstMiddleAddOnCities[$myIndex]['image'] = $imageFile[0]['file_name'];
						    }
					    }
					    $myIndex++;
				    }
			    }
		    }
	    }
	    if (!empty($firstMiddleAddOnCities)) {
		    $firstMiddleAddOnCities = $this->sortAddonCities($firstMiddleAddOnCities);
		    return response()->json(['first_middle_add_on_cities' => $firstMiddleAddOnCities]);
	    }
	    else {
		    return response()->json('error');
	    }
    }
    
    public function fetchSecondMiddleAddonCity($cityId, $firstMiddleAddonId) {
	    $myIndex = 0;
	    $secondMiddleAddOnCities = [];
	    $axDistance = CityDistanceTimeModel::select('id', 'distance')->where('city_from', (int)$cityId)->where('city_to', (int)$firstMiddleAddonId)->get()->toArray();
	    if (empty($axDistance)) {
		    $axDistance = CityDistanceTimeModel::select('id', 'distance')->where('city_from', (int)$firstMiddleAddonId)->where('city_to', (int)$cityId)->get()->toArray();
	    }
	    if (!empty($axDistance)) {
		    $axDistance = array_shift($axDistance);
		    $expectedMiddleAddonDistance = CityDistanceTimeModel::where('city_from', (int)$firstMiddleAddonId)->orderBy('distance', 'ASC')->get()->toArray();
		    if (!empty($expectedMiddleAddonDistance)) {
			    foreach ($expectedMiddleAddonDistance as $index => $value) {
				    $yaDistance = CityDistanceTimeModel::where('city_from', (int)$value["city_to"])->where('city_to', (int)$cityId)->get()->toArray();
				    if (empty($yaDistance)) {
					    $yaDistance = CityDistanceTimeModel::where('city_from', (int)$cityId)->where('city_to', (int)$value["city_to"])->get()->toArray();
				    }
				    if (!empty($yaDistance)) {
					    $yaDistance = array_shift($yaDistance);
					    $axyaDistance = $axDistance['distance'] + $value["distance"] + $yaDistance['distance'];
					    if ($axyaDistance <= 400000) {
						    $cityDetails = CityModel::where('id', (int)$value["city_to"])->get()->toArray();
						    if (!empty($cityDetails)) {
							    $cityDetails = array_shift($cityDetails);
							    $secondMiddleAddOnCities[$myIndex] = $cityDetails;
							    $secondMiddleAddOnCities[$myIndex]['prevDistance'] = $value["distance"];
							    $secondMiddleAddOnCities[$myIndex]['prevTime'] = $this->secondsToWords((int)$value["time"]);
							    $secondMiddleAddOnCities[$myIndex]['currDistance'] = $yaDistance["distance"];
							    $secondMiddleAddOnCities[$myIndex]['currTime'] = $this->secondsToWords((int)$yaDistance["time"]);
							    $cityImageId = CityImageModel::where('city_id', $value["city_to"])->get()->toArray();
							    if (!empty($cityImageId)) {
								    $cityImageId = $cityImageId[0]['city_image_file_id'];
								    $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
								    if (!empty($imageFile)) {
									    $secondMiddleAddOnCities[$myIndex]['image_id'] = $cityImageId;
									    $secondMiddleAddOnCities[$myIndex]['image'] = $imageFile[0]['file_name'];
								    }
							    }
							    $myIndex++;
						    }
					    }
				    }
			    }
		    }
	    }
	    if (!empty($secondMiddleAddOnCities)) {
		    $secondMiddleAddOnCities = $this->sortAddonCities($secondMiddleAddOnCities);
		    return response()->json(['second_middle_add_on_cities' => $secondMiddleAddOnCities]);
	    }
	    else {
		    return response()->json('error');
	    }
    }
    
    private function sortAddonCities($addOnCities) {
		if (count($addOnCities) <= 1) {
			return $addOnCities;
		}
		else {
			for ($i = 0; $i < count($addOnCities) - 1; $i++) {
				for ($j = 0; $j < count($addOnCities) - $i - 1; $j++) {
					if ($addOnCities[$j]["prevDistance"] > $addOnCities[$j + 1]["prevDistance"]) {
						$swap = $addOnCities[$j];
						$addOnCities[$j] = $addOnCities[$j + 1];
						$addOnCities[$j + 1] = $swap;
					}
				}
			}
		}
		return $addOnCities;
    }
    private function secondsToWords($seconds) {
	    $return = '';
	
	    /*** get the days ***/
	    $days = intval(intval($seconds) / (3600 * 24));
	    if ($days == 1) {
		    $return .= "$days day ";
	    }
	    elseif ($days > 1) {
		    $return .= "$days days ";
	    }
	
	    /*** get the hours ***/
	    $hours = (intval($seconds) / 3600) % 24;
	    if($hours > 0) {
		    $return .= "$hours h ";
	    }
	
	    /*** get the minutes ***/
	    $minutes = (intval($seconds) / 60) % 60;
	    if($minutes > 0) {
		    $return .= "$minutes min ";
	    }
	
	    /*** get the seconds ***/
	    /*$seconds = intval($seconds) % 60;
	    if ($seconds == 1) {
		    $return .= "$seconds second";
	    }
	    elseif ($seconds > 1) {
		    $return .= "$seconds seconds";
	    }*/
	
	    return $return;
    }
    public function recalculateAddonDistanceTime(Request $request, $prevAddOnId, $allAddOns) {
	    $allAddOns = explode(',', $allAddOns);
	    foreach ($allAddOns as $addOnId) {
	    	if ($prevAddOnId != $addOnId) {
			    $recalculated = CityDistanceTimeModel::where([['city_from', $prevAddOnId], ['city_to', $addOnId]])->get()->toArray();
			    if (empty($recalculated)) {
				    $recalculated = CityDistanceTimeModel::where([['city_from', $addOnId], ['city_to', $prevAddOnId]])->get()->toArray();
			    }
		    }
	    }
	    return response()->json(['add_on_cities' => $recalculated]);
    }
    public function displayAddOnCityDetails(Request $request){
		$city_details = CityImageModel::join('tp_files','tp_files.id', '=','tp_cities_images.city_image_file_id'  )->join('tp_cities', 'tp_cities.id', '=', 'tp_cities_images.city_id')->where('tp_cities_images.city_id', $request->current_add_on_city_id)->get();

        //Modified part
        if($request->has('place_details')) {
            $total_distance = 0;
            $w = '';
            $origin_city_id = $request->place_details['previous_city_id'];
            $destination_city_id = $request->place_details['destination'];
            $waypoints = $request->place_details['add_on_city_list'];
            array_push($waypoints, $request->current_add_on_city_id, $origin_city_id, $destination_city_id);

            $distance = CityDistanceTimeModel::where('city_from', $destination_city_id)->where('city_to', $origin_city_id)->get()->toArray();
            if (empty($distance)) {
                $distance = CityDistanceTimeModel::where('city_from', $origin_city_id)->where('city_to', $destination_city_id)->get()->toArray();
            }

            $city_place_id = [];
            foreach ($waypoints as $key => $value) {
                $city_detail = CityModel::select('id', 'place_id')->where('id', $value)->get()->toArray();
                array_push($city_place_id, $city_detail);
            }

            foreach ($city_place_id as $key => $value) {
                if ($value[0]['id'] == $origin_city_id) {
                    $origin_place_id = $value[0]['place_id'];
                }
                if ($value[0]['id'] == $destination_city_id) {
                    $destination_place_id = $value[0]['place_id'];
                }
            }
            foreach ($city_place_id as $key => $value) {
                if ($value[0]['id'] != $origin_city_id && $value[0]['id'] != $destination_city_id) {
                    $w .= '|place_id:' . $value[0]['place_id'];
                }
            }


            if($distance[0]['distance'] <= 500000){
                $path = 'https://maps.googleapis.com/maps/api/directions/json?units=metric&';
                $path = $path . 'origin=place_id:' . $origin_place_id . '&' . 'destination=place_id:' . $destination_place_id . '&' . 'waypoints=optimize:true' . $w . '&key=AIzaSyC8nojZwjsSAlY41iMgPcjpCsHPBqmCri8&libraries=places';
                $d = file_get_contents($path);
                $a = json_decode($d);
                $max_distance =  $distance[0]['distance'] + 50000;
                foreach ($a->routes[0]->legs as $key => $value) {
                    $total_distance += $value->distance->value;
                }
                if ($total_distance > $max_distance) {
                    return response()->json(['status'=>false, 'city_details'=>$city_details]);
                } else {
                    return response()->json(['status'=>true, 'city_details'=>$city_details]);
                }
            }


        }else{
            return response()->json(['status'=>true, 'city_details'=>$city_details]);
        }
    }
    public function checkAddOnCity(Request $request){









//        return response()->json($w);
    }

    public function fetchDistanceBetweenCities($currentCityId, $previousCityId)
    {
        $distanceModel = new CityDistanceTimeModel();
        $distance = $distanceModel->select('distance')->where('city_from', $previousCityId)->where('city_to', $currentCityId)->get()->toArray();
        if (empty($distance)) {
            $distance = $distanceModel->select('distance')->where('city_from', $currentCityId)->where('city_to', $previousCityId)->get()->toArray();
        }
        if (!empty($distance)) {
            $distance = $distance[0]['distance'];
            //$distance = round($distance[0]['distance'] / 1000);
            return response()->json(['distance' => $distance]);
        }
        else {
            return response()->json('error');
        }
    }
    
    public function fetchPrevCurrDistanceTime($previousCityId, $currentCityId, $firstaddonId = null, $secondaddonId = null) {
    	if ($secondaddonId == null) {
		    $pfData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $previousCityId], ['city_to', $firstaddonId]])->get()->toArray();
		    if (empty($pfData)) {
			    $pfData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $firstaddonId], ['city_to', $previousCityId]])->get()->toArray();
		    }
		    $pfData = array_shift($pfData);
		    $pfData["time"] = $this->secondsToWords((int)$pfData["time"]);
		    
		    $fcData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $firstaddonId], ['city_to', $currentCityId]])->get()->toArray();
		    if (empty($fcData)) {
			    $fcData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $currentCityId], ['city_to', $firstaddonId]])->get()->toArray();
		    }
		    $fcData = array_shift($fcData);
		    $fcData["time"] = $this->secondsToWords((int)$fcData["time"]);
		    
		    return response()->json(['prev1' => $pfData, 'prev2' => 0, 'curr' => $fcData]);
	    }
    	else {
		    $pfData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $previousCityId], ['city_to', $firstaddonId]])->get()->toArray();
		    if (empty($pfData)) {
			    $pfData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $firstaddonId], ['city_to', $previousCityId]])->get()->toArray();
		    }
		    $pfData = array_shift($pfData);
		    $pfData["time"] = $this->secondsToWords((int)$pfData["time"]);
		
		    $fsData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $firstaddonId], ['city_to', $secondaddonId]])->get()->toArray();
		    if (empty($fsData)) {
			    $fsData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $secondaddonId], ['city_to', $firstaddonId]])->get()->toArray();
		    }
		    $fsData = array_shift($fsData);
		    $fsData["time"] = $this->secondsToWords((int)$fsData["time"]);
		
		    $scData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $firstaddonId], ['city_to', $currentCityId]])->get()->toArray();
		    if (empty($scData)) {
			    $scData = CityDistanceTimeModel::select('distance', 'time')->where([['city_from', $currentCityId], ['city_to', $firstaddonId]])->get()->toArray();
		    }
		    $scData = array_shift($scData);
		    $scData["time"] = $this->secondsToWords((int)$scData["time"]);
		
		    return response()->json(['prev1' => $pfData, 'prev2' => $fsData, 'curr' => $scData]);
	    }
	}
}
