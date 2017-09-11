<?php

namespace AppBundle\Service\Payment\PayU;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PayUOrder implements \JsonSerializable {

    /**
     *
     * @var string
     */
    private $continueUrl;

    /**
     *
     * @var string
     */
    private $notifyUrl;

    /**
     *
     * @var string
     */
    private $customerIp;

    /**
     *
     * @var array
     */
    private $products = [];

    /**
     *
     * @var string
     */
    private $description;

    /**
     *
     * @var string
     */
    private $currencyCode = 'PLN';

    /**
     *
     * @var string
     */
    private $totalAmount;

    /**
     *
     * @var string
     */
    private $merchantPosId;

    /**
     *
     * @var PayUBuyer
     */
    private $buyer;

    /**
     *
     * @var type 
     */
    private $config;

    public function __construct(ContainerInterface $containerInterface, UrlGeneratorInterface $urlGenerator) {
        $this->config = $containerInterface->getParameter('payu');

        $this->merchantPosId = $this->config['pos_id'];
    }

    /**
     *
     * @param PayUBuyer $buyer
     */
    public function setBuyer(PayUBuyer $buyer): void {
        $this->buyer = $buyer;
    }

    /**
     *
     * @return PayUBuyer
     */
    public function getBuyer(): PayUBuyer {
        return $this->buyer;
    }

    /**
     *
     * @return string
     */
    public function getMerchantPosId(): string {
        return $this->merchantPosId;
    }

    /**
     *
     * @param string $merchantPosId
     */
    public function setMerchantPosId(string $merchantPosId): void {
        $this->merchantPosId = $merchantPosId;
    }

    /**
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     *
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     *
     * @return string
     */
    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    /**
     *
     * @param string $currencyCode
     */
    public function setCurrncyCode(string $currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    /**
     *
     * @return string
     */
    public function getTotalAmount(): string {
        return $this->totalAmount;
    }

    /**
     *
     * @param string $totalAmount
     */
    public function setTotalAmount(string $totalAmount): void {
        $this->totalAmount = $totalAmount;
    }

    /**
     *
     * @return string
     */
    public function getContinueUrl(): string {
        return $this->continueUrl;
    }

    /**
     *
     * @param string $continueUrl
     */
    public function setContinueUrl(string $continueUrl): void {
        $this->continueUrl = $continueUrl;
    }

    /**
     *
     * @return string
     */
    public function getNotifyUrl(): string {
        return $this->notifyUrl;
    }

    /**
     *
     * @param string $notifyUrl
     */
    public function setNotifyUrl(string $notifyUrl): void {
        $this->notifyUrl = $notifyUrl;
    }

    /**
     *
     * @return string
     */
    public function getCusomerIp(): string {
        return $this->customerIp;
    }

    /**
     *
     * @param string $customerIp
     */
    public function setCustomerIp(string $customerIp): void {
        $this->customerIp = $customerIp;
    }

    /**
     *
     * @return array
     */
    public function getProducts(): array {
        return $this->products;
    }

    /**
     *
     * @param type $product
     */
    public function addProduct($product): void {
        $this->products[] = $product;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}