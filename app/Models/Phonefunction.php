<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Phonefunction extends Model
{
    use HasFactory;
    protected $table = 'phonefunctions';
    protected $fillable = [
        'name',
        'slug',
    ];
    // public function Icfunctions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Icfunction::class, 'icfunctions_phonefunctions');
    // }
}
