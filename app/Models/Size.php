<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['id','product_size', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
