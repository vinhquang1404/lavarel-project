<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'sale',
        'price'
    ];
    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function salePrice(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['sale']
            ? $this->attributes['price'] - ($this->attributes['sale'] * 0.01 * $this->attributes['price'])
            : 0
        );
    }

}
