# BankOn SDK PHP

Essa biblioteca permite você se conectar com https://dev.bankon.com.br através do seu sistema.

Essa biblioteca não é oficial. Contudo, a considero funcional, pois sempre adiciono novas ferramentas.

## Documentação da API

A documentação oficial da API Rest se encontra aqui: https://dev.bankon.com.br

## Instalação

Você pode usar **Composer**

### Composer

O metodo mais conveniente é via [composer](https://getcomposer.org/). Se ainda não possui o composer instalado, [siga as instruções](https://getcomposer.org/doc/00-intro.md).

Execute o seguinte comando na raiz do seu projeto para instalar a biblioteca:

```sh
composer require fmedeiros95/bankon-sdk-php
```

Inclua o autoloader em seu projeto:

```php
require_once 'vendor/autoload.php';
```

### Consultar Saldo ###

Recupere informações de saldo da conta:

```php
use BankOn\Cliente;
use BankOn\Services\Consultas\Saldo;
use BankOn\Exceptions\BankOnException;

$cliente = new Cliente;
$cliente->setTokenConsulta("TOKEN_CONSULTA");

try{
    $saldo = Saldo::get($cliente);

    echo $saldo->getValorDisponivel();
    echo $saldo->getUsuario();

}catch(BankOnException $e){
    echo $e->getMessage();
}
```

### Consultar Transfência ###

Recupere informações de transfência:

```php
use BankOn\Cliente;
use BankOn\Services\Consultas\Transferencia;
use BankOn\Exceptions\BankOnException;

$cliente = new Cliente;
$cliente->setTokenConsulta("TOKEN_CONSULTA");

$codigo = "xxxxxxxx";

try{
    $transferencia = Transferencia::get($cliente,$codigo);

    echo $transferencia->getData();
    echo $transferencia->getValor();
    echo $transferencia->getOrigemUsuario();
    echo $transferencia->getOrigemNome();
    echo $transferencia->getOrigemDocumento();
    echo $transferencia->getDestinoUsuario();
    echo $transferencia->getDestinoNome();
    echo $transferencia->getDestinoDocumento();
    echo $transferencia->getDataCarbon();// retorna a data pra ser usada com a biblioteca https://carbon.nesbot.com/

}catch(BankOnException $e){
    echo $e->getMessage();
}
```
### Consultar Usuário ###

Recupere informações do usuário:

```php
use BankOn\Cliente;
use BankOn\Services\Consultas\Usuario;
use BankOn\Exceptions\BankOnException;

$cliente = new Cliente;
$cliente->setTokenConsulta("TOKEN_CONSULTA");

$usuario = "fulanodetal";

try{
    $usuario = Usuario::get($cliente, $usuario);

    echo $usuario->getDocumento();
    echo $usuario->getNome();
    echo $usuario->getUsuario();
    echo $usuario->getEmail();
    echo $usuario->getCidade();
    echo $usuario->getEstado();

}catch(BankOnException $e){
    echo $e->getMessage();
}
```
### Nova Transferência ###

Transfira valores da sua conta para terceiros:

```php
use BankOn\Cliente;
use BankOn\Services\Financeiro\NovaTransferencia;
use BankOn\Services\Financeiro\Transferencia;
use BankOn\Exceptions\BankOnException;

$cliente = new Cliente;
$cliente->setTokenTransacao("TOKEN_TRANSACAO");

$transferencia = new Transferencia;
$transferencia->setBeneficiario('test');
$transferencia->setValor(100);
$transferencia->setIdTransferencia('test');

try{
    $novaTransferencia = new NovaTransferencia;
    $resposta = $novaTransferencia->executar($cliente,$transferencia);

    echo $resposta->getTransacao();
    echo $resposta->getFavorecido();
    echo $resposta->getFavorecidoUser();
    echo $resposta->getData();
    echo $resposta->getHora();
    echo $resposta->getValor();

}catch(BankOnException $e){
    echo $e->getMessage();
}
```
### Solicitar Pagamentos ###

Solicite pagamentos de forma simples:

```php
use BankOn\Cliente;
use BankOn\Services\Checkout\SolicitarPagamento;
use BankOn\Services\Checkout\Solicitar;
use BankOn\Exceptions\BankOnException;

$cliente = new Cliente;
$cliente->setTokenTransacao("TOKEN_TRANSACAO");

$solicitar = new Solicitar;
$solicitar->setEmail('test@gmail.com');
$solicitar->setValor(100);
$solicitar->setRefPagamento('test');
$solicitar->setUrlCallbackSuccesso('http://www.seudominio.com.br/url-sucesso');// Após o pagamento ser efetuado pelo cliente, ele será redirecionado para a url_callback contendo o parâmero transacao na url: http://www.seudominio.com.br/url_callback?transacao={codigo_transacao}
$solicitar->setUrlCallbackFalha('http://www.seudominio.com.br/url-falha');

try{
    $solicitarPagamento = new SolicitarPagamento;
    $resposta = $solicitarPagamento->executar($cliente, $solicitar);

    echo $resposta->getTokenPagamento();
    echo $resposta->getUrlPagamento(); // Uma vez que a solicitação é criada, use a URL que você encontra nesse metódo para gerar um botão de pagamento
    echo $resposta->getSolicitacao(); // Data de solicitação
    echo $resposta->getExpiracao(); // Data de expiração
    $resposta->getExpiracaoCarbon(); // retorna a data pra ser usada com a biblioteca https://carbon.nesbot.com/

}catch(BankOnException $e){
    echo $e->getMessage();
}
```
Para garantir maior integridade e segurança, opcionalmente você poderá fazer a validação da transação seguindo os passos em Consultar Transferência.
