<?php
	
	namespace App\Http\Controllers;
	
	use App\CityDistanceTimeModel;
	use App\RouteCityModel;
	use App\RouteModel;
	use Illuminate\Http\Request;
	use App\CityModel;
	use App\CountryModel;
	use App\FileModel;
	use App\CityImageModel;
	use Illuminate\Pagination\LengthAwarePaginator;
	use test\Mockery\MockingProtectedMethodsTest;
	
	class CityController extends Controller
	{
		public function addCityForm()
		{
			return view('admin.cities.add-city-form');
		}
		
		public function saveCity(Request $request)
		{
			if ($request->input('suggested_destination')) {
				$suggested_destination = 1;
			}
			if (isset($request->place_id) AND $request->place_id != null) {
				$place_id = $request->place_id;
				$city_full_name = $request->city_name;
			} else {
				if ((isset($request->nearest_address_place_id) AND $request->nearest_address_place_id != null) OR (isset($request->check_nearest_city) AND $request->check_nearest_city == 'on')) {
					$nearest_address_place_id = $request->nearest_address_place_id;
					$city_name = $request->city_name;
					$city_full_name = $request->nearest_address;
				} else {
					return redirect('admin/city/add')->with('error', 'Sorry, The city name you specified does not match. Do you want to add nearest city?')->withInput();
				}
			}
			$cityModel = new CityModel();
			if (isset($place_id) AND $place_id != null) {
				$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				//$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . 'ChIJN1t_tDeuEmsRUsoyG83frY4' . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				$data = file_get_contents($path);
				$data = json_decode($data);
				$city_name = $data->result->name;
				$existingCities = $cityModel->where('place_id', $place_id)->where('city_name', $city_name)->get()->toArray();
			}
			else {
				$existingCities = '';
			}
			if (empty($existingCities)) {
				$place_id = (isset($place_id) AND $place_id != null) ? $place_id : $nearest_address_place_id;
				$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				//$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . 'ChIJN1t_tDeuEmsRUsoyG83frY4' . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				$data = file_get_contents($path);
				$data = json_decode($data);
				if (!isset($city_name)) {
					$city_name = $data->result->name;
				} else {
					$nearest_address = $data->result->name;
				}
				if ($request->hasfile('filename')) {
					$this->validate($request, [
						'filename' => 'required',
						'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
					]);
					$cityId = CityModel::create([
						'city_name' => $city_name,
						'city_full_name' => $city_full_name,
						'nearest_address' => isset($nearest_address) ? $nearest_address : $city_name,
						'country_id' => 1,
						'place_id' => $place_id,
						'latitude' => $data->result->geometry->location->lat,
						'longitude' => $data->result->geometry->location->lng,
						'suggested_destination' => (isset($request->suggested_destination) AND $request->suggested_destination == 'on') ? 1 : 0,
						'priority' => isset($request->priority) ? $request->priority : 0,
						'attraction' => (isset($request->attraction) AND $request->attraction == 'on') ? 1 : 0,
						'description' => (isset($request->description) AND $request->description != null) ? $request->description : '',
						'city_data' => json_encode($data)
					]);
					$cityId = $cityId->id;
					$imagePath = '';
					foreach ($request->file('filename') as $image) {
						$imageName = $image->getClientOriginalName();
						$imageExtension = $image->getClientOriginalExtension();
						//$imageName = random_generator() . random_generator() . random_generator() . '.' . $imageExtension;
						//File::makeDirectory($cityId);
						$imagePath = $imageName;
						$image->move(public_path() . '/admin/assets/images/cities/', $imageName);
						if ($imageExtension == 'jpeg' OR $imageExtension == 'png' OR $imageExtension == 'jpg' OR $imageExtension == 'gif' OR $imageExtension == 'svg') {
							$fileType = 'Image';
						}
						$fileId = FileModel::create([
							'file_name' => $imageName,
							'file_path' => $imagePath,
							'file_type' => $fileType
						]);
						$fileId = $fileId->id;
						$cityImageModel = new CityImageModel();
						$cityImageModel->city_id = isset($cityId) ? $cityId : 0;
						$cityImageModel->city_image_file_id = isset($fileId) ? $fileId : 0;
						$cityImageModel->save();
					}
					
				}
				return redirect('admin/cities')->with('status', 'You have successfully added a new city');
			} else {
				return redirect('admin/cities')->with('error', 'You have already added this city');
			}
		}
		
		/*function random_generator(){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randstring = str_shuffle($characters);
			return substr($randstring,0,8);
		}*/
		
		public function showCities()
		{
			$cityModel = new CityModel();
			$cities = $cityModel->get()->toArray();
			$countryModel = new CountryModel();
			$cityImageModel = new CityImageModel();
			$fileModel = new FileModel();
			$data = [];
			foreach ($cities as $key => $value) {
				$country = $countryModel->where('id', $value['country_id'])->get()->toArray();
				$country = array_shift($country);
				$cityImage = $cityImageModel->where('city_id', $value['id'])->get()->toArray();
				$data['cities'][$value['id']] = $value;
				$data['cities'][$value['id']]['country_name'] = $country['country_name'];
				if (isset($cityImage) AND !empty($cityImage)) {
					foreach ($cityImage as $index => $details) {
						$fileId = $details['city_image_file_id'];
						$file = $fileModel->where('id', $fileId)->get()->toArray();
						foreach ($file as $fileDetails) {
							$data['cities'][$value['id']]['file_name'][$index] = $fileDetails['file_name'];
						}
					}
				}
			}
			$data = collect($data['cities']);
			$pagination = $this->customPaginate($data, 10)->setPath('cities');
			return view('admin.cities.show-city', ['data' => $pagination]);
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
		
		public function editCityForm($cityId)
		{
			$cityModel = new CityModel();
			$city = $cityModel->where('id', $cityId)->get()->toArray();
			$city = array_shift($city);
			/*$destinations['place_id'] = $city['place_id'];
			$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $city['place_id'] . '&key=AIzaSyDmlYDmMwu4hdGtV85zSnJJyDrgD6G_4TI';
			$data_get = file_get_contents($path);
			$data_get = json_decode($data_get);
			$default_name = $data_get->result->formatted_address;*/
			$data = [];
			//$city['place_full_name'] = $default_name;
			$data['city'] = $city;
			return view('admin.cities.edit-city-form', ['data' => $data]);
		}
		
		public function updateCity(Request $request, $cityId)
		{
			if ($request->input('suggested_destination')) {
				$suggested_destination = 1;
			}
			if (isset($request->place_id) AND $request->place_id != null) {
				$place_id = $request->place_id;
				$city_full_name = $request->city_name;
			} else {
				if ((isset($request->nearest_address_place_id) AND $request->nearest_address_place_id != null) OR (isset($request->check_nearest_city) AND $request->check_nearest_city == 'on')) {
					$nearest_address_place_id = $request->nearest_address_place_id;
					$city_name = $request->city_name;
					$city_full_name = $request->nearest_address;
				} else {
					return redirect('admin/city/' . $cityId . '/edit')->with('city_error', 'Sorry, The city name you specified does not match. Please fill in any one of them (City Name or Nearest Address) properly')->withInput();
				}
			}
			$cityModel = new CityModel();
			if (isset($place_id) AND $place_id != null) {
				$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				//$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . 'ChIJN1t_tDeuEmsRUsoyG83frY4' . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				$data = file_get_contents($path);
				$data = json_decode($data);
				$city_name = $data->result->name;
				$existingCities = $cityModel->where('place_id', $place_id)->where('city_name', $city_name)->get()->toArray();
			}
			else {
				$existingCities = '';
			}
			if (empty($existingCities)) {
				$place_id = (isset($place_id) AND $place_id != null) ? $place_id : $nearest_address_place_id;
				$path = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
				$data = file_get_contents($path);
				$data = json_decode($data);
				$city_name = $request->city_name;
				if (!isset($city_name)) {
					$city_name = $data->result->name;
				} else {
					$nearest_address = $data->result->name;
				}
				$cityModel = new CityModel();
				$city = $cityModel->where('id', $cityId)->update([
					'city_name' => $city_name,
					'city_full_name' => $city_full_name,
					'nearest_address' => isset($nearest_address) ? $nearest_address : $city_name,
					'country_id' => 1,
					'place_id' => $place_id,
					'latitude' => $data->result->geometry->location->lat,
					'longitude' => $data->result->geometry->location->lng,
					'suggested_destination' => (isset($request->suggested_destination) AND $request->suggested_destination == 'on') ? 1 : 0,
					'priority' => isset($request->priority) ? $request->priority : 0,
					'attraction' => (isset($request->attraction) AND $request->attraction == 'on') ? 1 : 0,
					'description' => (isset($request->description) AND $request->description != null) ? $request->description : '',
					'city_data' => json_encode($data)
				]);
				return redirect('admin/cities')->with('status', 'You have successfully updated city');
			}
			else {
				return redirect('admin/cities')->with('error', 'You entered city name already exists');
			}
		}
		
		public function fetchCities(Request $request)
		{
			$route_details = RouteModel::where('id', $request->route_id)->get()->toArray();
			$route_details = array_shift($route_details);
			
			$routeCities = json_decode($route_details['cities']);
			
			
			/*if (session()->has('anonymous_route_id')) {
				
				$data = session()->get('anonymous_route_id');
				foreach ($data as $key => $value) {
					if ($value == $route_id) {
						$c = [];
						$check_route = RouteModel::join('tp_routes_cities', 'tp_routes.id', '=', 'tp_routes_cities.route_id')->select('tp_routes_cities.city_id')->where('tp_routes.id', $route_id)->get()->toArray();
						if (!empty($check_route)) {
							$city_details = CityModel::select('id', 'city_name')->get()->toArray();
							$count = 0;
							foreach ($check_route as $key => $value) {
								$selected_cities[] = $value['city_id'];
							}
							foreach ($city_details as $value) {
								if (!in_array($value['id'], $selected_cities)) {
									$c[$value['id']]['id'] = $value['id'];
									$c[$value['id']]['city_name'] = $value['city_name'];
								}
							}
						}
					}
				}
				
				
			} else if (session()->has('role')) {
				$user_id = session()->get('id');
				$c = [];
				$check_route = RouteModel::join('tp_routes_cities', 'tp_routes.id', '=', 'tp_routes_cities.route_id')->select('tp_routes_cities.city_id')->where('tp_routes.id', $route_id)->where('tp_routes.user_id', $user_id)->get()->toArray();
				if (!empty($check_route)) {
					$city_details = CityModel::select('id', 'city_name')->get()->toArray();
					$count = 0;
					foreach ($check_route as $key => $value) {
						$selected_cities[] = $value['city_id'];
					}
					
					foreach ($city_details as $value) {
						if (!in_array($value['id'], $selected_cities)) {
							//array_push($c, $value);
							$c[$value['id']]['id'] = $value['id'];
							$c[$value['id']]['city_name'] = $value['city_name'];
						}
					}
				}
			}*/
			//return response()->json($c);
		}
		
		public function getCities($previousCityId = null, $firstAddonCityId= null, $secondAddonCityId = null)
		{
			/*if ($request->ajax()) {
				$output = '';
				$cityModel = new CityModel();
				$cities = $cityModel->where('city_name', 'like', '%' . $request->searchtext . '%')->get()->toArray();
				if (!empty($cities)) {
					foreach ($cities as $index => $value) {
						$output .= '<div><i class="material-icons primary-color" style="opacity: 0.5; vertical-align: middle;">location_on</i>' . $value['city_name'] . '</div>';
					}
				} else {
					$output .= '<div><i class="material-icons primary-color" style="opacity: 0.5; vertical-align: middle;">location_on</i>No Location found</div>';
				}

				return response($output);
			}*/
            // Get all suggested cities in ascending order
            // $suggestedCities = CityModel::select('id', 'city_name', 'place_id', 'latitude', 'longitude', 'suggested_destination', 'priority')->where('suggested_destination', 1)->orderBy('priority', 'ASC')->get()->toArray();
            // $suggestedCities = CityModel::where('suggested_destination', 1)->orderBy('priority', 'ASC')->get()->toArray();

			if ($previousCityId == null) {
				$suggestedCities = CityModel::where('suggested_destination', 1)->orderBy('priority', 'ASC')->get()->toArray();
                // Get Havana city id
                $havanaCityId = CityModel::where('city_name', 'Havana, Cuba')->select('id')->get()->toArray();
                $havanaCityId = $havanaCityId[0]['id'];
                // Get cities from Havana depending upon distance (< 600km and closer to further)
                $otherCityIds = CityDistanceTimeModel::where([['city_from', $havanaCityId], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
                if (empty($otherCityIds)) {
                    $otherCityIds = CityDistanceTimeModel::where([['city_to', $havanaCityId], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
                }
            }
            else {
            	$sKey = 0;
	            $suggestedDestinations = CityModel::where('suggested_destination', 1)->orderBy('priority', 'ASC')->get()->toArray();
	            $suggestedCities = [];
            	if ((int)$firstAddonCityId == 0 AND (int)$secondAddonCityId == 0) {
		            foreach ($suggestedDestinations as $key => $sugCity) {
			            $dis = CityDistanceTimeModel::where([['city_from', $previousCityId], ['city_to', $sugCity["id"]], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
			            if (empty($dis)) {
				            $dis = CityDistanceTimeModel::where([['city_from', $sugCity["id"]], ['city_to', $previousCityId], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
			            }
			            if (empty($dis)) {
			            	unset($suggestedDestinations[$key]);
			            }
			            else {
				            $suggestedCities[$sKey++] = $suggestedDestinations[$key];
			            }
		            }
		            // Get cities from previous city depending upon distance (< 600km and closer to further)
		            $otherCityIds = CityDistanceTimeModel::where([['city_from', $previousCityId], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
		            if (empty($otherCityIds)) {
			            $otherCityIds = CityDistanceTimeModel::where([['city_to', $previousCityId], ['distance', '<', 600000]])->orderBy('distance', 'ASC')->get()->toArray();
		            }
	            }
                elseif ((int)$secondAddonCityId == 0) {
            		$maxDistance = 600000;
            		$axDistance = CityDistanceTimeModel::where([['city_from', (int)$previousCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
	                if (empty($axDistance)) {
		                $axDistance = CityDistanceTimeModel::where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
	                }
            		$axDistance = array_shift($axDistance);
            		$remainingDistance = $maxDistance - $axDistance["distance"];
	                $otherCityIds = CityDistanceTimeModel::where([['city_from', $previousCityId], ['distance', '<', $remainingDistance]])->orderBy('distance', 'ASC')->get()->toArray();
	                if (empty($otherCityIds)) {
		                $otherCityIds = CityDistanceTimeModel::where([['city_to', $previousCityId], ['distance', '<', $remainingDistance]])->orderBy('distance', 'ASC')->get()->toArray();
	                }
                }
            	else {
		            $maxDistance = 600000;
		            $axDistance = CityDistanceTimeModel::where([['city_from', (int)$previousCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
		            if (empty($axDistance)) {
			            $axDistance = CityDistanceTimeModel::where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$previousCityId]])->get()->toArray();
		            }
		            $axDistance = array_shift($axDistance);
		            $xyDistance = CityDistanceTimeModel::where([['city_from', (int)$firstAddonCityId], ['city_to', (int)$secondAddonCityId]])->get()->toArray();
		            if (empty($xyDistance)) {
			            $xyDistance = CityDistanceTimeModel::where([['city_from', (int)$secondAddonCityId], ['city_to', (int)$firstAddonCityId]])->get()->toArray();
		            }
		            $xyDistance = array_shift($xyDistance);
		            $remainingDistance = $maxDistance - ($axDistance["distance"] + $xyDistance["distance"]);
		            $otherCityIds = CityDistanceTimeModel::where([['city_from', $previousCityId], ['distance', '<', $remainingDistance]])->orderBy('distance', 'ASC')->get()->toArray();
		            if (empty($otherCityIds)) {
			            $otherCityIds = CityDistanceTimeModel::where([['city_to', $previousCityId], ['distance', '<', $remainingDistance]])->orderBy('distance', 'ASC')->get()->toArray();
		            }
	            }
            }

            $otherCities = [];
			if (!empty($otherCityIds)) {
                foreach ($otherCityIds as $value) {
                    // Get details of those cities which are in between 600 km from Havana
                    // $otherCityDetails = CityModel::select('id', 'city_name', 'place_id', 'latitude', 'longitude', 'suggested_destination', 'priority')->where([['suggested_destination', 0], ['id', $value["city_to"]]])->get()->toArray();
                    $otherCityDetails = CityModel::where([['suggested_destination', 0], ['id', $value["city_to"]]])->get()->toArray();
	                //$otherCityDetails[0]['prevDistance'] = (int)$value["distance"];
	                //$otherCityDetails[0]['prevTime'] = (int)$value["time"];
                    if (!empty($otherCityDetails)) {
                        array_push($otherCities, $otherCityDetails[0]);
                    }
                }
                // Merge these two variables to get all cities
                $allCities = array_merge($suggestedCities, $otherCities);
                foreach ($allCities as $index => $value) {
                    // Get city's image id
                    $cityImageId = CityImageModel::where('city_id', $value['id'])->get()->toArray();
                    if (!empty($cityImageId)) {
                        $cityImageId = $cityImageId[0]['city_image_file_id'];
                        // Get city's image file name
                        $imageFile = FileModel::where('id', $cityImageId)->get()->toArray();
                        if (!empty($imageFile)) {
                            $allCities[$index]['image_id'] = $cityImageId;
                            $allCities[$index]['image'] = $imageFile[0]['file_name'];
                        }
                    }
                    $allCities[$index]['selectedAsCity'] = false;
                    $allCities[$index]['selectedAsAddOn'] = false;
                    $allCities[$index]['addon'] = false;
	                
                }
            }
            if (!empty($allCities)) {
                return response()->json(['cities' => $allCities]);
            }
            else {
                return response()->json('error');
            }
		}
		
		public function fetchCity()
		{
			
			$city_list = CityModel::select('id', 'city_name')->get();
			return response()->json($city_list);
		}
	}
