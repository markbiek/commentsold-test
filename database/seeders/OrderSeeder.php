<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends AbstractSeeder {
	public function __construct() {
		parent::__construct(
			'orders',
			__DIR__ . '/data/orders.csv',
			\App\Models\Order::class,
		);
	}

	protected function cleanRecord(array $record): array {
		$cols = ['ship_charged_cents', 'ship_cost_cents'];

		foreach ($cols as $col) {
			$record[$col] = intVal($record[$col]);
		}

		return $record;
	}
}
