<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name','path','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function path() :string {
        return Storage::disk('products')->url($this->name);
        
       
    }
}
