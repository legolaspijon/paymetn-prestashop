<?php

use \BlockCypher\Client\PaymentForwardClient;
use \BlockCypher\Rest\ApiContext;

class BlockcypherAPIHelper
{
    /**
     * Generate forwarding address
     *
     * @param ApiContext $apiContext
     * @param string $wallet_address
     * @param array $callbakParams
     * @return BlockCypher\Api\PaymentForward
     */
    static public function generateForwardingAddress(ApiContext $apiContext, $wallet_address, $callbakParams = array())
    {
        $paymentForwardClient = new PaymentForwardClient($apiContext);
        $options = array(
            'callback_url' => "http://my.address.com?" . http_build_query($callbakParams) // TODO set callback url
        );

        return $paymentForwardClient->createForwardingAddress($wallet_address, $options);
    }
}