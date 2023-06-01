<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'customer_id',
    'status_id',
    'user_id',
  ];
  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function orderdetails()
  {
    return $this->hasMany(Orderdetail::class);
  }
}
