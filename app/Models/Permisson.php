<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class Permisson extends Permission
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'group'
    ];

}
