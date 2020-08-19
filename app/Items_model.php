<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_model extends Model
{
    protected $table = 'items';

    protected $fillable = ['name', 'status', 'stock', 'expired_date'];
}
