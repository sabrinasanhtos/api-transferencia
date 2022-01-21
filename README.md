# api-transferencia
 
Desenvolvido em:
- API Rest em lumen-framework 8.3.1

Projeto carregado em localhost:8080

### Features

1) Cadastro de Usuario
2) Lista de Usuarios;
3) Usuario por id.
4) transações entre usuario (somente usuario comun pode transferir)
5) Consulta saldo
6) extratos do Usuario


- Cadastro Usuario POST ( localhost:8080/usuario/cadastro )

- Visualizar todas os Usuarios GET ( localhost:8080/usuario/)

- Lista somente um Usuario GET ( localhost:8080/usuario/{id} )
    
- Transações entre Usuarios ( localhost:8080/carteira/transacao/{id} )
    
- Saldo do Usuario ( localhost:8080/carteira/saldo/{idUsuario} )
    
- Deposito na carteira do Usuario ( localhost:8080/carteira/deposito/{idUsuario} )

- Extrato do Usuario ( localhost:8080/carteira/extratos/{idUsuario} )

