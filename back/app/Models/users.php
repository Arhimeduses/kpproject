<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = "users";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'surname',
        'secondname',
        'email',
        'phone_number',
        'password',
    ];
}
