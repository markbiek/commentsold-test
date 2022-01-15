<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->integer('product_id')->nullable(false);
			$table->integer('inventory_id')->nullable(false);
			$table->text('street_address')->nullable(false);
			$table->text('apartment')->nullable(true);
			$table->text('city')->nullable(false);
			$table->text('state')->nullable(false);
			$table->text('country_code')->nullable(false);
			$table->text('zip')->nullable(false);
			$table->string('phone_number')->nullable(false);
			$table->text('email')->nullable(false);
			$table->string('name')->nullable(false);
			$table->string('order_status')->nullable(false);
			$table->text('payment_ref')->nullable(false);
			$table->string('transaction_id')->nullable(false);
			$table->integer('payment_amt_cents')->nullable(false);
			$table->integer('ship_charged_cents')->nullable(true);
			$table->integer('ship_cost_cents')->nullable(false);
			$table->integer('subtotal_cents')->nullable(false);
			$table->integer('total_cents')->nullable(false);
			$table->integer('tax_total_cents')->nullable(false);
			$table->text('shipper_name')->nullable(false);
			$table
				->timestamp('payment_date')
				->nullable(false)
				->useCurrent();
			$table
				->timestamp('shipped_date')
				->nullable(false)
				->useCurrent();
			$table->text('tracking_number')->nullable(false);
			$table->timestamps();
		});

		Schema::table('orders', function (Blueprint $table) {
			$table->index('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders');
	}
}
