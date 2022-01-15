<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
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

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = ['password', 'remember_token', 'card_last_four'];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'trial_starts_at' => 'datetime',
		'trial_ends_at' => 'datetime',
	];

	public function scopeEnabled($query) {
		return $query->where('is_enabled', true);
	}

	public function scopeSuperadmin($query) {
		return $query->where('superadmin', true);
	}
}
