<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'product_id',
		'street_address',
		'apartment',
		'city',
		'state',
		'country_code',
		'zip',
		'phone',
		'email',
		'name',
		'order_status',
		'payment_ref',
		'transaction_id',
		'payment_amt_cents',
		'ship_charged_cents',
		'ship_cost_cents',
		'subtotal_cents',
		'total_cents',
		'tax_total_cents',
		'shipper_name',
		'payment_date',
		'shipped_date',
		'tracking_number',
	];

	public function product() {
		return $this->belongsTo('App\Models\Product');
	}

	public function user() {
		// TODO
	}
}
