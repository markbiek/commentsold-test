<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends AbstractSeeder {
	public function __construct() {
		parent::__construct(
			'users',
			__DIR__ . '/data/users.csv',
			\App\Models\User::class,
		);
	}

	protected function cleanRecord(array $record): array {
		$record['password'] = Hash::make($record['password_plain']);
		unset($record['password_hash']);
		unset($record['password_plain']);

		return $record;
	}
}
