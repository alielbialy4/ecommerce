<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'section_id',
        'discount'
    ];
    public function image(){
        return $this->hasOne(Image::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
