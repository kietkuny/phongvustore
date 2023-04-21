<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'description',
    'content',
    'producttype_id',
    'trademark_id',
    'promotion_id',
    'thumb',
    'quantity',
    'price',
  ];
  public function promotion()
  {
    return $this->belongsTo(Promotion::class);
  }
  public function trademark()
  {
    return $this->belongsTo(Trademark::class);
  }
  public function producttype()
  {
    return $this->belongsTo(ProductType::class);
  }
}
