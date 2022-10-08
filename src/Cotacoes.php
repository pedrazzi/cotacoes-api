<?php

declare(strict_types=1);

namespace Pedrazzi\Cotacoes;

/**
 * API de Cotações de Moedas
 * 
 * Mais de 150 moedas diferentes!
 * 
 * Atraído da API AwesomeAPI 
 * 
 * @link https://docs.awesomeapi.com.br/api-de-moedas
 * @author Fábio Pedrazzi <pedrazzi@hotmail.com>
 * @date 06/10/2022
 * 
 */

class Cotacoes
{
	const URL_BASE = 'https://economia.awesomeapi.com.br/';

	/**
	 * available
	 *
	 * lista completa de combinações/nomes das moedas
	 * 
	 * @param bool $uniq
	 * @author Fábio Pedrazzi <pedrazzi@hotmail.com>
	 * @date 08/10/2022
	 */
	public function available(bool $uniq = false): object|array
	{
		$url = 'available/';
		if ($uniq) $url .= 'uniq';
		return $this->request($url);
	}

	/**
	 * last
	 *
	 * Retorna a ultima ocorrência das moedas selecionadas.
	 * 
	 * @param string $moedas "USD-BRL" or "USD-BRL,EUR-BRL,BTC-BRL"
	 * @author Fábio Pedrazzi <pedrazzi@hotmail.com>
	 * @date 08/10/2022
	 */
	public function last(string $moedas = 'USD-BRL'): object|array
	{
		$url = "last/$moedas";
		return $this->request($url);
	}

	/**
	 * daily
	 *
	 * Retorna o fechamento dos últimos dias.
	 * 
	 * @param string $moeda "USD-BRL"
	 * @param string|int $numero_dias nº de dias 30/60/90/.../360 dias
	 * @author Fábio Pedrazzi <pedrazzi@hotmail.com>
	 * @date 08/10/2022
	 */
	public function daily(string $moeda = 'USD-BRL', string|int $numero_dias = 7): object|array
	{
		$url = "daily/$moeda/$numero_dias";
		return $this->request($url);
	}

	/**
	 * sequencia
	 *
	 * Retorna cotações sequenciais de uma única moeda
	 * 
	 * @param string $moeda "USD-BRL"
	 * @param string|int $quantidade 10
	 *
	 * @author Fábio Pedrazzi <pedrazzi@hotmail.com>
	 * @date 08/10/2022
	 */
	public function sequencia(string $moeda = 'USD-BRL', string|int $quantidade = 10): object|array
	{
		$url = "daily/$moeda/$quantidade";
		return $this->request($url);
	}

	public function request(string $url = ''): object|array
	{
		try {
			$result = file_get_contents(self::URL_BASE . $url);
			return json_decode($result);
		} catch (\Exception $th) {
			return (array) $th;
		}
	}
}
