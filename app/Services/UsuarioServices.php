<?php
namespace App\Services;

use App\Repositories\UsuarioRepository;
use App\Repositories\CarteiraRepository;

class UsuarioServices
{
    /**
     * @var usuarioRepository
     * @var carteiraRepository
     */

    protected $usuarioRepository;
    protected $carteiraRepository;

    /**
     * UsuarioRepository constructor
     * 
     * @param usuarioRepository $usuarioRepository
     * @param carteiraRepository $carteiraRepository
     * 
     */

    public function __construct(UsuarioRepository $usuarioRepository, CarteiraRepository $carteiraRepository){
        $this->usuarioRepository  = $usuarioRepository;
        $this->carteiraRepository = $carteiraRepository;
    }

    /**
     * cadastro de usuarios e carteira
     * 
     * @param array $data
     * @return String
     * 
     */
    public function cadastro($data)
    {
        $usuarioId = $this->usuarioRepository->cadastro($data);
        $status_transferencia = ($data['tipousuario_id'] == 1) ? true : false ; 
        return $this->carteiraRepository->cadastro($usuarioId, $status_transferencia);
    }

    /**
     * lista de usuarios 
     * @return String
     * 
     */
    public function lista()
    {
        return $this->usuarioRepository->lista();
    }

    /**
     * cadastro de usuarios e carteira
     * 
     * @param int $id
     * @return String
     * 
     */
    public function listaId($id)
    {
        return $this->usuarioRepository->listaId($id);
    }
}