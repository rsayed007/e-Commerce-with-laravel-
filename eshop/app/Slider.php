<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable  = ['slider_name','slider_price','slider_description','collection_year','button_name','button_link','slider_image'];
    
}
