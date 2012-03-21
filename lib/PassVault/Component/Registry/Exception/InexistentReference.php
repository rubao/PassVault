<?php

class PassVault_Component_Registry_Exception_InexistentReference extends RuntimeException
{
    public function __construct($reference)
    {
        parent::__construct(sprintf("Trying to access inexistent reference: %s", $reference));
    }
}
