<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'content',
      'producttype_id',
      'trademark_id',
      'thumb',
      'price',
    ];
    public function trademark(){
      return $this->belongsTo(Trademark::class);
    }
    public function producttype(){
      return $this->belongsTo(ProductType::class);
    }
}
