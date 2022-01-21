<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use App\Models\TipoUsuario;


class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
    */
    protected $visible = ['id', 'nome', 'cpf_cnpj', 'email', 'created_at', 'tipousuario_id'];
    protected $hidden = ['senha'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $table = 'usuario';

    public function TipoUsuario()
    {  
        //return $this->belongsTo(TipoUsuario::class, 'tipousuario_id', 'id');
        return $this->belongsTo(TipoUsuario::class, 'tipousuario_id', 'id');
    }
}
