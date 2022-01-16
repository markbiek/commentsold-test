<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends AbstractSeeder {
	public function __construct() {
		parent::__construct(
			'products',
			__DIR__ . '/data/products.csv',
			\App\Models\Product::class,
		);
	}
}
