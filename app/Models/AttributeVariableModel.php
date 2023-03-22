<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeVariableModel extends Model
{
    use HasFactory;

    protected $table = 'attr_variables';

    protected $fillable = ['attr_id', 'product_variable_id'];

    public function getAttributeModel(){
        return $this->belongsTo(AttributeModel::class, 'attr_id');
    }
}
