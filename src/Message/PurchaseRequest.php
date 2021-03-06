<?php

namespace Omnipay\DibsD2\Message;

class PurchaseRequest extends GeneralRequest
{
    public $endpoint = 'https://payment.architrade.com/paymentweb/start.action';

    public function getData()
    {
        $data = parent::getData();
        $data['capturenow'] = true;
        return $data;
    }

    public function sendData($data)
    {
        return new RedirectResponse($this, $data, $this->endpoint);
    }
}
