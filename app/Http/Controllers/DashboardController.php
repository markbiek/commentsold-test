<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AddProductRequest;
use App\Models\Product;

class DashboardController extends Controller {
	public function show(Request $request) {
		$user = Auth::user();

		$products = $user->products()->get();

		$direction = 'desc';
		if ($request->has('direction')) {
			$direction = $request->query('direction');
		}

		if (
			$request->has('sort') &&
			$request->query('sort') === 'potential_revenue'
		) {
			if ($direction === 'desc') {
				$products = $products->sortByDesc('potential_revenue_cents');
			} else {
				$products = $products->sortBy('potential_revenue_cents');
			}
		}

		if ($direction === 'desc') {
			$direction = 'asc';
		}

		return view('dashboard', [
			'user' => $user,
			'products' => $products,
			'direction' => $direction,
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
