<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['id', 'valor', 'tipo', 'autorizacao','pagadora', 'beneficiaria', 'created_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $table = 'transacao';
}