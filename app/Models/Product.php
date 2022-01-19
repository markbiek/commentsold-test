<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'product_name',
		'description',
		'style',
		'brand',
		'url',
		'product_type',
		'shipping_price',
		'note',
		'admin_id',
	];

	protected $appends = ['potential_revenue_cents'];

	public function user() {
		return $this->belongsTo(User::class, 'admin_id');
	}

	public function inventory() {
		return $this->hasMany(Inventory::class);
	}

	public function getPotentialRevenueCentsAttribute() {
		return DB::table('inventories')
			->select(
				DB::raw(
					'SUM(quantity * price_cents) as potential_revenue_cents',
				),
			)
			->where('product_id', $this->id)
			->pluck('potential_revenue_cents')
			->first();
	}
}
