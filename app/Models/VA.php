<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VA extends Model
{
    protected $table = 'virtual_accounts';

    protected $fillable = [
        'bank_name',
        'number',
    ];
}
