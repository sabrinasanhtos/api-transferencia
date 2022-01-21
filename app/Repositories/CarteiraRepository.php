<?php
namespace App\Repositories;

use App\Models\Carteira;

class CarteiraRepository
{
    /**
     * @var $carteira
     */

    protected $carteira;

    /**
     * CarteiraRepository constructor
     * 
     * @param Carteira
     * @param id_usuario
     * 
     */

    public function __construct(Carteira $carteira){
        $this->carteira = $carteira;
    }

    /**
     * cadastro - cadastra a carteira do usuario 
     * 
     * @param int $idUsuario
     * @param boolean $statusTransferencia
     * @return Carteira
     * 
     */
    public function cadastro($idUsuario, $statusTransferencia)
    {
        $saldo = 0; 
        $carteira = new $this->carteira;
        $carteira->saldo = $saldo;
        $carteira->usuario_id = $idUsuario;
        $carteira->status_transferencia = $statusTransferencia;
        $carteira->save();

        return $carteira;
    }

    /**
     * saldo - saldo que possui na carteira do usuario 
     * 
     * @param int $idUsuario
     * @return Carteira
     * 
     */
    public function saldo($idUsuario)
    {
        $carteira = new $this->carteira;
        return $carteira->select('saldo')->find($idUsuario);
    }

    /**
     * deposito - deposito na carteira do usuario 
     * 
     * @param int $idUsuario
     * @param float $saldoAtualizado
     * @return Carteira
     * 
     */
    public function operacao($idUsuario, $saldoAtualizado)
    {
        $carteira = new $this->carteira;
        $carteira = $carteira->find($idUsuario);
        $carteira->saldo = $saldoAtualizado;
        $carteira->save();
        
        return $carteira;
    }
}