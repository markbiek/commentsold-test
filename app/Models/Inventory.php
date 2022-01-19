<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'product_id',
		'sku',
		'quantity',
		'color',
		'size',
		'weight',
		'length',
		'width',
		'height',
		'price_cents',
		'sale_price_cents',
		'cost_cents',
		'note',
	];

	protected $appends = ['price', 'cost'];

	public function product() {
		return $this->belongsTo('App\Models\Product');
	}

	public function getPriceAttribute() {
		return '$' . number_format($this->price_cents / 100, 2);
	}

	public function getCostAttribute() {
		return '$' . number_format($this->cost_cents / 100, 2);
	}
}
