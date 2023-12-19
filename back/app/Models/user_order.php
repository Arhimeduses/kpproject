<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_order extends Model
{
    use HasFactory;

    protected $table = "user_order";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'order_id',
    ];
}
