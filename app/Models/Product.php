<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = ['name','description','quantity','category_id','price','image'];

    public function Category(){
    return $this->belongsTo(Category::class);
    }

}
