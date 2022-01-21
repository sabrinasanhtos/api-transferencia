<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['banco', 'created_at'];
    protected $dateFormat = 'U';
    protected $table = 'banco';
}