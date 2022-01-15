<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersFields extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function (Blueprint $table) {
			$table
				->boolean('superadmin')
				->nullable(false)
				->default(false);
			$table
				->boolean('is_enabled')
				->nullable(false)
				->default(false);
			$table
				->string('shop_name')
				->default('')
				->nullable(false);
			$table
				->string('shop_domain')
				->default('')
				->nullable(false);
			$table
				->string('card_brand')
				->default('')
				->nullable(false);
			$table
				->string('card_last_four')
				->default('')
				->nullable(false);
			$table
				->string('billing_plan')
				->default('')
				->nullable(false);
			$table->timestamp('trial_starts_at')->nullable(true);
			$table->timestamp('trial_ends_at')->nullable(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function (Blueprint $table) {
			$columns = [
				'superadmin',
				'is_enabled',
				'shop_name',
				'shop_domain',
				'card_brand',
				'card_last_four',
				'billing_plan',
				'trial_starts_at',
				'trial_ends_at',
			];
			foreach ($columns as $column) {
				$table->dropColumn($column);
			}
		});
	}
}
