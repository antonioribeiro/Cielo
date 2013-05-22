<?php
/**
 * Cielo
 *
 * Cliente para o Web Service da Cielo.
 *
 * O Web Service permite efetuar vendas com cartões de bandeira
 * VISA e Mastercard, tanto no débito quanto em compras a vista ou parceladas.
 *
 * Licença
 * Este código fonte está sob a licença GPL-3.0+
 *
 * @category   Library
 * @package    MrPrompt\Cielo
 * @subpackage Cliente
 * @copyright  Thiago Paes <mrprompt@gmail.com> (c) 2013
 * @license    GPL-3.0+
 */

namespace MrPrompt\Cielo\Requisicao;

use MrPrompt\Cielo\Autorizacao;
use MrPrompt\Cielo\Transacao;
use MrPrompt\Cielo\Cliente;

/**
 * Requisição de autorizacao de transação
 *
 * @author Luís Otávio Cobucci Oblonczyk <lcobucci@gmail.com>
 */
class AutorizacaoTransacao extends Requisicao
{
    /**
     * Identificador de chamada do tipo transacao
     *
     * @const integer
     */
    const ID = 2;

    /**
     * Inicializa o objeto
     *
     * @param Autorizacao $autorizacao
     * @param Transacao $transacao
     */
    public function __construct(Autorizacao $autorizacao, Transacao $transacao)
    {
        parent::__construct($autorizacao, $transacao);
    }

    /**
     * {@inheritdoc}
     */
    protected function getXmlInicial()
    {
        return sprintf(
            '<%s id="%d" versao="%s"></%s>',
            'requisicao-autorizacao-tid',
            self::ID,
            Cliente::VERSAO,
            'requisicao-autorizacao-tid'
        );
    }
}
