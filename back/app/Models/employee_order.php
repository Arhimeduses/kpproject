<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_order extends Model
{
    use HasFactory;

    protected $table = "employee_order";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'employee_id',
        'order_id',
    ];
}
