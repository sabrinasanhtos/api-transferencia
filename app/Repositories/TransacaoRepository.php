<?php
namespace App\Repositories;

use App\Models\Transacao;

class TransacaoRepository
{
    /**
     * @var $trasacao
     */

    protected $trasacao;

    /**
     * TransacaoRepository constructor
     * 
     * @param transacao
     * 
     */

    public function __construct(Transacao $transacao){
        $this->transacao = $transacao;
    }

    /**
     * transações 
     * 
     * @param array $data
     * @return Transacao
     * 
     */
    public function cadastroTransacao($data)
    {
        $transacao = new $this->carteira;
        $transacao->id_carteira = $data['id_carteira'];
        $transacao->autorizacao = $data['autorizacao'];
        $transacao->pagadora = $data['pagadora'];
        $transacao->beneficiaria = $data['beneficiaria'];
        $transacao->save();

        return $transacao;
    }
}