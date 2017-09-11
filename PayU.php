<?php

namespace AppBundle\Service\Payment\PayU;

use OpenPayU_Configuration;
use OauthGrantType;
use OpenPayU_Order;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PayU {

    /**
     * PayU lib configuration
     * @var OpenPayU_Configuration
     */
    private $payUConfig;

    /**
     *
     * @var array
     */
    private $config;

    /**
     *
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface) {
        $this->config     = $containerInterface->getParameter('payu');
        $this->payUConfig = new \OpenPayU_Configuration();

        $this->payUConfig->setEnvironment($this->config['environment']);
        $this->payUConfig->setMerchantPosId($this->config['pos_id']);
        $this->payUConfig->setSignatureKey($this->config['pos_id_md5']);
        $this->payUConfig->setOauthClientId($this->config['oauth_client_id']);
        $this->payUConfig->setOauthClientSecret($this->config['oauth_client_secret']);
        $this->payUConfig->setOauthGrantType(OauthGrantType::CLIENT_CREDENTIAL);
    }

    /**
     *
     * @param PayUOrder $order
     */
    public function pay(PayUOrder $order) {
        $payUOrder = new OpenPayU_Order();
        $orderArr  = json_decode(json_encode($order), true);

        try {
            $response = $payUOrder->create($orderArr);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

        return $response;
    }

    /**
     *
     * @return array
     */
    public function getPayUConfig() {
        return $this->payUConfig;
    }
}