<?php
namespace App\Services;

use App\Repositories\UsuarioRepository;
use App\Repositories\CarteiraRepository;
use App\Repositories\TransacaoRepository;

class CarteiraServices
{
    /**
     * @var carteiraRepository
     * @var transacaoRepository
     *
     */

    protected $carteiraRepository;
    protected $trasacaoRepository;

    /**
     * CarteiraRepository constructor
     * 
     * @param carteiraRepository $carteiraRepository
     * @param trasacaoRepository $trasacaoRepository
     * 
     */

    public function __construct(
        CarteiraRepository $carteiraRepository, 
        TransacaoRepository $trasacaoRepository
    ){
        $this->carteiraRepository = $carteiraRepository;
        $this->trasacaoRepository = $trasacaoRepository;
    }

    /**
     * slado da carteira por usuario
     * 
     * @param int $idUsuario
     * @return String
     * 
     */
    public function saldo($idUsuario)
    {
        return $this->carteiraRepository->saldo($idUsuario);
    }

    /**
     * saldo da carteira por usuario
     * 
     * @param array $data
     * @return String
     * 
     */
    public function deposito($data)
    {
        $saldo = $this->carteiraRepository->saldo($data['usuario_id']);
        $saldoAtualizado = (float) $data['valor'] + $saldo->saldo ;
        return $this->carteiraRepository->operacao($data['usuario_id'], $saldoAtualizado);
    }

    /**
     * saldo da carteira por usuario
     * 
     * @param array $data
     * @return String
     * 
     */
    public function transacao($data)
    {
        if($data['tipousuario'] == 2){
            return 'Conta bloqueada para esse tipo de transacao';
        }
        
        try {
            \DB::beginTransaction();
            $saldoUsuarioRetirada = $this->carteiraRepository->saldo($data['idUsuarioRetirada']);
            if($saldoUsuarioRetirada->saldo >= $data['valor']){
                $saldo = $saldoUsuarioRetirada->saldo -  $data['valor'];
                $carteiraSaque = $this->carteiraRepository->operacao($data['idUsuarioRetirada'], $saldo);

                $autorizador = true;
                if($autorizador === true){
                    $saldousuarioReceber = $this->carteiraRepository->saldo($data['idUsuarioReceber']);
                    $saldoAtualizado = (float) $data['valor'] + $saldousuarioReceber->saldo ;
                    $carteiraDeposito = $this->carteiraRepository->operacao($data['idUsuarioReceber'], $saldoAtualizado);
                    $transacao = $this->cadastroTransacao($data, compact('carteiraSaque', 'carteiraDeposito'));
                    \DB::commit();
                    return compact('carteiraSaque', 'carteiraDeposito', 'transacao');
                }
                else
                    \DB::rollback();
                    return false;
            }
            else
                return 'Saldo insuficiente';
                
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }

    /**
     * Cadastro Transacões
     * 
     * @param array $data
     * @param array $carteira
     * @return String
     * 
     */
    private function cadastroTransacao($data, $carteira){
        $arrTrasacao = [
            'id_carteira' => $id_carteira,
            'autorizacao' => $autorizador,
            'pagadora' => $pagadora,
            'beneficiaria' => $autorizador,
            'valor' => $autorizador,
            'tipo' => $autorizador
        ];
    }
}