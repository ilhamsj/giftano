<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'image'
    ];
    public function Category()
    {
        return $this->hasOne('App\Category');
    }
}
