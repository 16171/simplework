<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable = ['name',
        'catalog_id',
        'user_id',
        'price',
        'body',
        'small_body',
        'picture',
        'status',];
        protected function catalogs(){
            return $this->belongsTo('App\Catalog','');
        }
}
