<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 30/05/2017
 * Time: 09:15
 */

namespace App\Http\Controllers\Admin;

use App\Services\CobrancaService;

class CobrancaController
{
    public function __construct(CobrancaService $cobrancaService)
    {
        $this->cobrancaService = $cobrancaService;
    }

    public function calculaValores($mes)
    {
        return $this->cobrancaService->calcula($mes);
    }

    public function emiteBoletos($mes)
    {
        return $this->cobrancaService->emitir($mes);
    }
}