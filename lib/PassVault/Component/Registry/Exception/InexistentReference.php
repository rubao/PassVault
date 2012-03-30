<?php

namespace PassVault\Component\Registry\Exception;

class InexistentReference extends \RuntimeException
{
    public function __construct($reference)
    {
        parent::__construct(sprintf("Trying to access inexistent reference: %s", $reference));
    }
}
