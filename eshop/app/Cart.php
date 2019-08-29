<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function RelationWithProductTable()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function RelationWithColorTable()
    {
        return $this->hasOne('App\Color', 'id', 'color_id');
    }
    public function RelationWith_SizeTable()
    {
        return $this->hasOne('App\Size', 'id', 'size_id');
    }
}
