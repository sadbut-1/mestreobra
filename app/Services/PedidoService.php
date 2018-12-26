<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 27/03/2017
 * Time: 17:08
 */

namespace App\Services;

use App\Mail\EnvioInteressado;
use App\Mail\EnvioPrestadores;
use App\Models\LogEnvioEmail;
use App\Models\Prestador;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use App\Models\Pedido;
use App\Models\LogEmailSituacaoPedido;
use App\Mail\StatusPedido;
use App\Mail\AvaliacaoPrestador;
use App\Mail\EnvioCC;
use App\Mail\ServicoAvaliado;
use App\Models\LogEmailAvaliacao;

class PedidoService
{
    private $logEnvioEmail;
    private $prestador;
    private $logEmailAvaliacao;

    public function __construct(LogEnvioEmail $logEnvioEmail,
                                Prestador $prestador,
                                LogEmailSituacaoPedido $logSituacaoPedido,
                                LogEmailAvaliacao $logEmailAvaliacao,
                                Pedido $pedido)
    {
        $this->logEnvioEmail = $logEnvioEmail;
        $this->prestador = $prestador;
        $this->logSituacaoPedido = $logSituacaoPedido;
        $this->logEmailAvaliacao = $logEmailAvaliacao;
        $this->pedido = $pedido;
    }

    /*
     * Envia email de novo pedido aos prestadores
     */
    public function sendEmail($emails,$pedido)
    {
        $response = [];
        if(env('APP_ENV') == 'production') {
            foreach ($emails as $email) {
                $prestador = $this->prestador->where('email', $email)->first();
                if ($prestador) {
                    Mail::to($prestador->email)->send(new EnvioPrestadores($prestador, $pedido));

                    //cria log de envio
                    $this->logEnvioEmail->create(['pedido_id' => $pedido->id, 'prestador_id' => $prestador->id]);

                    //Envia cópia de pedido de serviço
                    if ($pedido->cc) {
                        Mail::to($pedido->cc)->send(new EnvioCC($prestador, $pedido));
                    }

                    //envia sms
                    if (isset($prestador->fone) && $prestador->fone != '') {
                        $msg = "Nova solicitacao. Confira em http://backend.mestreobra.com.br/pedido/show/" . $pedido->hash . "/" . $prestador->id;
                        $response[] = $this->sendSMS($prestador->fone, $msg);
                    }

                } else {
                    $erros[] = $email;
                }
            }
        } elseif (env('APP_ENV') == 'local') {
            $prestador = $this->prestador->where('email', 'eduardommoya@gmail.com')->first();
            Mail::to($prestador->email)->send(new EnvioPrestadores($prestador, $pedido));
        }
        return $response;
    }

    /*
     * Envia email ao cliente perguntando sobre a situação do pedido
     */
    public function sendEmailStatus($id)
    {
        $pedido = $this->pedido->find($id);
        Mail::to($pedido->email)->send(new StatusPedido($pedido));
        $this->logSituacaoPedido->create(['pedido_id' => $id]);
        $msg = "Algum profissional ja entrou em contato? Responda em http://backend.mestreobra.com.br/pedido/situacao/".$pedido->hash."/1";
        $this->sendSMS($pedido->celular, $msg);
    }

    /*
 * Envia email ao cliente perguntando sobre a situação do pedido
 */
    public function sendEmailInteressado($interessado)
    {
        Mail::to($interessado->pedido->email)->send(new EnvioInteressado($interessado));
    }

    /*
     * Envia email ao cliente pedindo avaliação do prestador
     */
    public function sendEmailValuation($id)
    {
        $pedido = $this->pedido->find($id);
        Mail::to($pedido->email)->send(new AvaliacaoPrestador($pedido));
        $this->logEmailAvaliacao->create(['pedido_id' => $id]);
    }

    /*
     * Envia email ao prestador com sua avaliação
     */
    public function saveEmailValuation($pedido)
    {
        Mail::to($pedido->prestador[0]->email)->send(new ServicoAvaliado($pedido));
    }


    /*
 * Envia SMS do novo pedido aos prestadores
 */
    public function sendSMS($fone, $msg)
    {
        $clientSMS = new Client();
        $troca = array('(', ')', '-', ' ');
        $cel = str_replace($troca, '', $fone);
        $mobile = "55" . $cel;
        $msg = URLEncode($msg);

        $response = $clientSMS->post('http://system.human.com.br/GatewayIntegration/msgSms.do?dispatch=send&account=especie&code=WopKlBBI5U&to='.$mobile.'&from=MestreObra&msg='.$msg);

        return $response->getStatusCode();
    }
}