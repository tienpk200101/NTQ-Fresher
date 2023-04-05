<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    protected $fillable = ['term_id', 'value', 'slug'];

    public function getTermAttribute() {
        return $this->belongsTo(Term::class, 'term_id');
    }
}