<?php

namespace AppBundle\Service\Payment\PayU;

class PayUProduct implements \JsonSerializable {

    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var string
     */
    private $unitPrice;

    /**
     *
     * @var int
     */
    private $quantity;

    /**
     *
     * @param string $name
     * @param string $unitPrice
     * @param int $quantity
     */
    public function __construct(string $name = '', string $unitPrice = '', int $quantity = 0) {
        $this->name      = $name;
        $this->unitPrice = $unitPrice;
        $this->quantity  = $quantity;
    }

    /**
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     *
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getUnitPrice(): string {
        return $this->unitPrice;
    }

    /**
     *
     * @param string $unitPrice
     */
    public function setUnitPrice(string $unitPrice): void {
        $this->unitPrice = $unitPrice;
    }

    /**
     *
     * @return string
     */
    public function getQuantity(): string {
        return $this->quantity;
    }

    /**
     *
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}