<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

	public function user() {
		return $this->belongsTo(User::class, 'admin_id');
	}

	public function inventory() {
		return $this->hasMany(Inventory::class);
	}
}
