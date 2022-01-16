<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AddProductRequest;
use App\Models\Product;

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

	public function add_product(AddProductRequest $request) {
		$user = Auth::user();
		$data = $request->except('_token');
		$data['admin_id'] = $user->id;

		Product::create($data);

		return redirect()->route('dashboard');
	}
}
