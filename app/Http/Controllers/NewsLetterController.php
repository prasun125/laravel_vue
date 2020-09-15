<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsLetter;

class NewsLetterController extends Controller
{
	public function getNewsletter() {
		return view('newsletter');
	}
	
	public function saveNewsletter(Request $request) {
		$transactionModel = new NewsLetter();
		$transaction = $transactionModel->create(
			[
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'planning_for' => $request->planning_for,
				'days' => $request->days,
				'special_request' => $request->special_request,
			]
		);
		if($transaction) {
			return back()->with('success','Please check your email to access the coupon code.');
		}
		else {
			return back()->with('error','There are some problems.');
		}
	}
}
