<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['descricao'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $table = 'tipousuario';

    public function usuario()
    {
       //return $this->hasMany(Usuario::class, 'id', 'tipousuario_id');
       return $this->belongsTo('App\Models\Usuario', 'id');
    }
}