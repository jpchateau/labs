<?php

namespace JP\MiscBundle\Entity;

class User
{
    private $iban;

    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    public function getIban()
    {
        return $this->iban;
    }
}
