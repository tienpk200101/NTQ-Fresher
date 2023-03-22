<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'regular_price',
        'sale_price',
        'images',
        'order',
        'stock',
        'discount',
        'author',
        'tax',
        'ship',
        'is_attr',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function getProductVariable() {
        return $this->hasMany(ProductVariableModel::class, 'product_id');
    }
}
