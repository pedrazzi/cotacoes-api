# cotacoes-api

Biblioteca `PHP` para consulta dos dados da API [AwesomeAPI](https://docs.awesomeapi.com.br/api-de-moedas).

## Instalação

Execute o seguinte comando para instalar esta biblioteca:

```bash
$ composer require pedrazzi/cotacoes-api
```

## Como utilizar

Você deve adicionar o autoload.php do composer no seu arquivo PHP.

```php
require 'vendor/autoload.php';
```

## Documentação
```php
require 'vendor/autoload.php';

use Pedrazzi\Cotacoes\Cotacoes;

// instancia a classe de cotações
$quote = new Cotacoes();

// lista completa de combinações
$combinacoes = $quote->available();

// lista completa com nomes das moedas
$completa = $quote->available(true);

// Retorna a última ocorrência da cotação: USD-BRL
$lastUSDBRL = $quote->last('USD-BRL');

// Retorna a última ocorrência das cotações: USD-BRL,EUR-BRL,BTC-BRL
$lastUSDBRLEURBRLBTCBRL = $quote->last('USD-BRL,EUR-BRL,BTC-BRL');

// Retorna o fechamento dos últimos dias da cotação: USD-BRL
$daily = $quote->daily('USD-BRL', 15);

// Retorna as 100 últimas cotações de USD-BRL
$sequencia = $quote->sequencia('USD-BRL', 10);

```
