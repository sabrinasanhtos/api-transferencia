<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['id', 'saldo', 'created_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $table = 'carteira';

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }
}