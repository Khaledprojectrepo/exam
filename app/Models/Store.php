<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['merchant_id', 'name'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
    public function Category()
    {
                    return $this->hasMany(Category::class, 'shop_id');

    }
}








