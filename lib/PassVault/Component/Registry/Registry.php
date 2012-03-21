<?php

require_once dirname(__FILE__)."/Exception/InexistentReference.php";

class PassVault_Component_Registry_Registry
{
    private $references = null;
    
    private function getReferencesContainer()
    {
        if (is_null($this->references)) {
            $this->references = new ArrayObject;
        }
        
        return $this->references;
    }
    
    private function hasReference($referenceName)
    {
        return $this->getReferencesContainer()->offsetExists($referenceName);
    }
    
    public function register($referenceName, $object)
    {
        $this->getReferencesContainer()->offsetSet($referenceName, $object);
    }
    
    public function unregister($referenceName)
    {
        if ($this->hasReference($referenceName)) {
            $this->references->offsetUnset($referenceName);
        } else {
            throw new PassVault_Component_Registry_Exception_InexistentReference($referenceName);
        }
    }
    
    public function get($referenceName)
    {
        if ($this->hasReference($referenceName)) {
            return $this->references[$referenceName];
        }
    }
}
