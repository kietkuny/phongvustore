<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable implements MustVerifyEmail
{
  use HasFactory, Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */

  protected $table = 'customers';

  protected $fillable = [
    'name',
    'phone',
    'housenumber',
    'city_id',
    'province_id',
    'email',
    'password',
    'status',
    'token',
    'remember_token',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
  ];

  public function province()
  {
    return $this->belongsTo(Province::class);
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function messages()
  {
    return $this->hasMany(Message::class);
  }
}
