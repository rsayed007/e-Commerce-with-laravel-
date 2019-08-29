<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable  = ['product_name','product_price','product_description','product_quantity','alert_quantity','product_image'];

}
