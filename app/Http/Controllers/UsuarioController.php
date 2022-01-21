<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UsuarioServices;

class UsuarioController extends Controller
{
    /**
     * @var UsuarioServices
     */
    protected $usuario;
   
    /**
     * Usuario constructor
     * 
     * @param UsuarioServices $usuarioServices
     * 
     */
    public function __construct(UsuarioServices $usuarioServices)
    {
        $this->usuarioServices = $usuarioServices;
        //$this->middleware('auth');
    }

    /**
     * cadastro de usuarios 
     * 
     * @param Request $request
     * 
     */
    public function cadastro(Request $request)
    {
        $data = $request->only([
            'nome',
            'cpf_cnpj',
            'email',
            'senha',
            'tipousuario_id',
        ]);

        try {
            $result['data'] = $this->usuarioServices->cadastro($data);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        
        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * lista de usuarios 
     * 
     */
    public function lista()
    {   
        try {
            $result['data'] = $this->usuarioServices->lista();
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * lista de usuario por id
     * 
     * @param int $id
     * 
     */
    public function listaId($id)
    {   
        try {
            $result['data'] = $this->usuarioServices->listaId($id);
        } catch (\Exception $e) {
            return response()->json([
                'error'=> $e->getMessage()], 
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json($result, Response::HTTP_OK);
    }
}