<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventorySeeder extends AbstractSeeder {
	public function __construct() {
		parent::__construct(
			'inventories',
			__DIR__ . '/data/inventory.csv',
			\App\Models\Inventory::class,
		);
	}
}
