<?php

require_once __DIR__."/Exception/InexistentReference.php";

class PassVault_Component_Registry_Registry
{
    private $references = null;
    private static $instance = null;
    
    protected function __construct() {}
    
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
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new PassVault_Component_Registry_Registry;
        }
        
        return self::$instance;
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
            return $this->getReferencesContainer()->offsetGet($referenceName);
        } else {
            throw new PassVault_Component_Registry_Exception_InexistentReference($referenceName);
        }
    }
}
