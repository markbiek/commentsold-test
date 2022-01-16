<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('inventories', function (Blueprint $table) {
			$table->id();
			$table->integer('product_id')->nullable(false);
			$table->string('sku')->nullable(false);
			$table
				->integer('quantity')
				->nullable(false)
				->default(0);
			$table->text('color')->nullable(false);
			$table->text('size')->nullable(false);
			$table->double('weight', 8, 2)->nullable(false);
			$table->double('length', 8, 2)->nullable(false);
			$table->double('width', 8, 2)->nullable(false);
			$table->double('height', 8, 2)->nullable(false);
			$table->integer('price_cents')->nullable(false);
			$table->integer('sale_price_cents')->nullable(false);
			$table->integer('cost_cents')->nullable(false);
			$table->text('note')->nullable(true);
			$table->timestamps();
		});

		Schema::table('inventories', function (Blueprint $table) {
			$table->index('sku');
			$table->index('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('inventories');
	}
}
