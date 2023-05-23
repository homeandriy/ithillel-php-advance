<?php

namespace Homeandriy\Ithillel\Common;

class ContractBuilder
{
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $address;

    public function build(): void
    {
        echo '<h2>Анкета</h2>'
            . $this->name . ' ' . $this->surname . '<br>'
            . '<strong>' . $this->email . '</strong><br>'
            . '<strong>' . $this->phone . '</strong><br>'
            . '<strong>' . $this->address . '</strong><br>';
    }

    /**
     * @param string $name
     * @return ContractBuilder
     */
    public function setName(string $name): ContractBuilder
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $surname
     * @return ContractBuilder
     */
    public function setSurname(string $surname): ContractBuilder
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @param string $email
     * @return ContractBuilder
     */
    public function setEmail(string $email): ContractBuilder
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $phone
     * @return ContractBuilder
     */
    public function setPhone(string $phone): ContractBuilder
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string $address
     * @return ContractBuilder
     */
    public function setAddress(string $address): ContractBuilder
    {
        $this->address = $address;
        return $this;
    }
}
