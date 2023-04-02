<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariable extends Model
{
    use HasFactory;

    protected $table = 'product_variables';

    protected $fillable = ['product_id', 'stock', 'image', 'image', 'description', 'regular_price', 'sale_price', 'color', 'size'];

    public function getAttributeVariable() {
        return $this->hasMany(AttributeVariable::class, 'product_variable_id');
    }
}
