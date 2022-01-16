<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
	public function show(Request $request) {
		$user = Auth::user();

		return view('dashboard', [
			'products' => $user
				->products()
				->orderBy('brand')
				->orderBy('product_name')
				->orderBy('style')
				->get(),
		]);
	}
}
