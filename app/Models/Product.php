<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'specification', 'slug', 'category_id', 'minimum_size_id', 'maximum_size_id'];

    protected $casts = [
        'image' => 'array', // Cast the 'image' attribute to an array
    ];

    protected $table = 'products';


    public function categoryy()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function sizee()
    // {
    //     return $this->belongsTo(Size::class, 'size_id');
    // }
    // public function sizes()
    // {
    //     return $this->belongsTo(Size::class, 'size_id');
    // }

    public function minimumSize()
    {
        return $this->belongsTo(Size::class, 'minimum_size_id');
    }

    public function maximumSize()
    {
        return $this->belongsTo(Size::class, 'maximum_size_id');
    }
}
