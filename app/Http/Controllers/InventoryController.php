<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class InventoryController extends Controller {
	public function inventory(Request $request) {
		$user = Auth::user();

		$inventory = $user->inventory;

		if ($request->has('max_quantity')) {
			$inventory = $inventory
				->where('quantity', '<=', $request->get('max_quantity'))
				->sortByDesc('quantity');
		} else {
			$inventory = $inventory->sortBy('product_name');
		}

		return view('inventory', [
			'user' => $user,
			'inventory' => $inventory,
			'title' => 'Inventory',
		]);
	}

	public function product_inventory(Request $request, Product $product) {
		$user = Auth::user();
		if ($product->admin_id !== $user->id) {
			abort(403, 'You do not have access to this product!');
		}

		return view('inventory', [
			'user' => $user,
			'product' => $product,
			'inventory' => $product
				->inventory()
				->orderBy('quantity', 'desc')
				->get(),
			'title' => "{$product->product_name} - Inventory",
		]);
	}
}
