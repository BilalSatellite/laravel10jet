<?php

namespace App\Models;

use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Icattribute extends Model
{
    use HasFactory;
    protected $table = 'icattributes';
    protected $fillable = [
        'name',
        'values'
    ];
    protected $casts = [
        'values' => 'array',
    ];
    // protected function values(): Attribute
    // {
    //     dd($attributes);
    //     // set: fn (Address $value) => [
    //     //     'address_line_one' => $value->lineOne,
    //     //     'address_line_two' => $value->lineTwo,
    //     // ]
    // }

}
