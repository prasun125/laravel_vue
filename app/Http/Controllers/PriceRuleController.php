<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceRuleModel;

class PriceRuleController extends Controller
{
	public function addPriceRuleForm() {
		return view('admin.pricerules.add-price-rules-form');
	}
	
	public function savePriceRule(Request $request) {
		$priceRuleModel = new PriceRuleModel();
		$existingPriceRules = $priceRuleModel->where('min_distance', $request->min_distance)->where('max_distance', $request->max_distance)->where('min_hour', $request->min_hour)->where('max_hour', $request->max_hour)->where('cost', $request->cost)->get()->toArray();
		if (empty($existingPriceRules)) {
			$priceRuleModel->min_distance = $request->min_distance;
			$priceRuleModel->max_distance = $request->max_distance;
			$priceRuleModel->min_hour = $request->min_hour;
			$priceRuleModel->max_hour = $request->max_hour;
			$priceRuleModel->cost = $request->cost;
			$priceRuleModel->save();
			return redirect('admin/price-rules')->with('status', 'You have successfully added a new price rule');
		}
		else {
			return redirect('admin/price-rules')->with('error', 'You have already added this price rule');
		}
	}
	
	public function showPriceRules() {
		$priceRuleModel = new PriceRuleModel();
		$priceRules = $priceRuleModel->get()->toArray();
		$data = [];
		$data['priceRules'] = $priceRules;
		return view('admin.pricerules.show-price-rules', ['data' => $data]);
	}
	
	public function editPriceRuleForm($priceRuleId) {
		$priceRuleModel = new PriceRuleModel();
		$priceRules = $priceRuleModel->where('id', $priceRuleId)->get()->toArray();
		$priceRules = array_shift($priceRules);
		$data = [];
		$data['priceRules'] = $priceRules;
		return view('admin.pricerules.edit-price-rules-form', ['data' => $data]);
	}
	
	public function updatePriceRule(Request $request, $priceRuleId) {
		$priceRuleModel = new PriceRuleModel();
		$priceRules = $priceRuleModel->where('id', $priceRuleId)->update(['min_distance' => $request->min_distance, 'max_distance' => $request->max_distance, 'min_hour' => $request->min_hour, 'max_hour' => $request->max_hour, 'cost' => $request->cost]);
		return redirect('admin/price-rules')->with('status', 'You have successfully updated an existing price rule');
	}
}
