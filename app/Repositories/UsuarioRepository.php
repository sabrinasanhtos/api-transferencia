<?php
namespace App\Repositories;

use App\Models\Usuario;
use App\Models\TipoUsuario;
use DB;

class UsuarioRepository
{
    /**
     * @var $usuario
     */

    protected $usuario;

    /**
     * UsuarioRepository constructor
     * 
     * @param Usuario
     * 
     */

    public function __construct(Usuario $usuario){
        $this->usuario = $usuario;
    }

    /**
     * cadastro - cadastra o usuario e cria a carteira 
     * 
     * @param array $data
     * @return Usuario
     * 
     */
    public function cadastro($data)
    {
        $usuario = new $this->usuario;
        $usuario->nome = $data['nome'];
        $usuario->cpf_cnpj = $data['cpf_cnpj'];
        $usuario->email = $data['email'];
        $usuario->senha = $data['senha'];
        $usuario->tipousuario_id = $data['tipousuario_id'];
        $usuario->save();

        return $usuario->id;
    }

    /**
     * lista - lista de usuarios
     * @return Usuarios
     * 
     */
    public function lista()
    {
        $usuarios = DB::select(\DB::raw("
                    select u.nome, u.email, u.cpf_cnpj, t.descricao as tipo
                      from usuario u
                      join tipousuario t on u.tipousuario_id = t.id"
                    ));
                    
        return $usuarios;
    }

    /**
     * lista - usuario por id
     * @return Usuario
     * 
     */
    public function listaId($id)
    {  
        $usuario = DB::select(\DB::raw("
                    select u.nome, u.email, u.cpf_cnpj, t.descricao as tipo
                      from usuario u
                      join tipousuario t on u.tipousuario_id = t.id
                     where u.id = $id"
                    ));
                    
        return  (object)$usuario[0];
    }
}