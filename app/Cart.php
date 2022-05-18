<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['products_id', 'users_id'];
    protected $hidden = [];

    public function Product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
