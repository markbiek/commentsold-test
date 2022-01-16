<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('product_name')->nullable(false);
			$table->text('description')->nullable(true);
			$table->text('style')->nullable(false);
			$table->text('brand')->nullable(false);
			$table
				->string('url')
				->nullable(false)
				->default('');
			$table
				->string('product_type')
				->nullable(false)
				->default('');
			$table->integer('shipping_price')->nullable(false);
			$table->timestamps();
			$table->text('note')->nullable(true);
			$table
				->integer('admin_id')
				->nullable(false)
				->unsigned();
		});

		Schema::table('products', function (Blueprint $table) {
			$table->index('product_name');
			$table->fulltext('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
