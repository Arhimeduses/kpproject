<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $table = "orders";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'cost',
        'service_type',
        'status',
        'begin_date',
        'end_date',
    ];
}
