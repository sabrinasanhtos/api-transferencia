<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CarteiraServices;

class CarteiraController extends Controller
{
    /**
     * @var CarteiraServices
     */
    protected $carteiraServices;
   
    /**
     * Carteira constructor
     * 
     * @param CarteiraServices $carteiraServices
     * 
     */
    public function __construct(CarteiraServices $carteiraServices)
    {
        $this->carteiraServices = $carteiraServices;
    }

    /**
     * saldo do usuario 
     * 
     * @param int $idUsuario
     * 
     */
    public function saldo($idUsuario)
    {   
        try {
            $result['data'] = $this->carteiraServices->saldo($idUsuario);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        
        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * deposito  
     * 
     * @param int $idUsuario
     * @param float $valor
     * 
     */
    public function deposito(Request $request)
    {   
        $data = $request->only([
            'usuario_id',
            'valor',
        ]);

        try {
            $result['data'] = $this->carteiraServices->deposito($data);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        
        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * deposito  
     * 
     * @param int $id
     * @param int $idUsuario
     * @param float $valor
     * 
     */
    public function transacao(Request $request)
    {   
        $data = $request->only([
            'idUsuarioRetirada',
            'tipousuario',
            'idUsuarioReceber',
            'valor',
            'pagadora',
            'beneficiaria',
        ]);

        try {
            $result['data'] = $this->carteiraServices->transacao($data);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        
        return response()->json($result, Response::HTTP_OK);
    }
}