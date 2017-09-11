<?php

namespace AppBundle\Service\Payment\PayU;

class PayUBuyer implements \JsonSerializable {

    /**
     *
     * @var string
     */
    private $email;

    /**
     *
     * @var string
     */
    private $phone;

    /**
     *
     * @var string
     */
    private $firstName;

    /**
     *
     * @var string
     */
    private $lastName;

    /**
     *
     * @var string
     */
    private $language;

    public function __construct(string $email = '', string $phone = '', string $firstName = '', string $lastName = '', $language = 'pl') {
        $this->email     = $email;
        $this->phone     = $phone;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->language  = $language;
    }

    /**
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     *
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     *
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     *
     * @param string $phone
     */
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    /**
     *
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     *
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     *
     * @param string $lastName
     */
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     *
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

    /**
     *
     * @param string $language
     */
    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}