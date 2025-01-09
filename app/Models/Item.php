<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'image',
    ];

    public function image()
    {
        return Storage::url($this->image);
    }
}
