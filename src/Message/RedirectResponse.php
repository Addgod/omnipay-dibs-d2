<?php

namespace Omnipay\DibsD2\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class RedirectResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function __construct($purchaseRequest, $data, $endpoint)
    {
        parent::__construct($purchaseRequest, $data);
        $this->endpoint = $endpoint;
    }

    /**
     * Gets the redirect target url.
     */
    public function getRedirectUrl()
    {
        return $this->endpoint;
    }

    /**
     * Get the required redirect method (either GET or POST).
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     */
    public function getRedirectData()
    {
        $data = $this->getData();
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }
}
