<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icbrand extends Model
{
    use HasFactory;
    protected $table = 'icbrands';
    protected $fillable = [
        'name',
        'slug',
    ];
}
