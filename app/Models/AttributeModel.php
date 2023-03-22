<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    protected $fillable = ['term_id', 'value', 'slug'];

    public function getTermAttribute() {
        return $this->belongsTo(TermModel::class, 'term_id');
    }
}
