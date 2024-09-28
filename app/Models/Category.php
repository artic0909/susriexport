<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'slug'];

    protected $casts = [
        'image' => 'array', // Cast the 'image' attribute to an array
    ];

    protected $table = 'categories';

    

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
