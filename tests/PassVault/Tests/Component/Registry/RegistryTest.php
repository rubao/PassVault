<?php

class PassVault_Tests_Component_Registry_RegistryTest extends PHPUnit_Framework_TestCase
{
    public function testShouldAddAnObjectReferenceToRegistry()
    {
        $registry = PassVault_Component_Registry_Registry::getInstance();
        $object = new stdClass;
        $registry->register('object', $object);

        $this->assertSame($object, $registry->get('object'));
    }

    /**
     * @expectedException PassVault_Component_Registry_Exception_InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldRemoveObjectReferenceToRegistry()
    {
        $registry = PassVault_Component_Registry_Registry::getInstance();
        $object = new stdClass;
        $registry->register('object', $object);

        $registry->unregister('object');

        $registry->get('object');
    }

    /**
     * @expectedException PassVault_Component_Registry_Exception_InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldThrowAnExceptionWhenTryToUnregisterInexistentReference()
    {
        $registry = PassVault_Component_Registry_Registry::getInstance();
        $registry->unregister('object');
    }

    /**
     * @expectedException PassVault_Component_Registry_Exception_InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldThrowAnExceptionWhenTryToAccessANonRegisteredReference()
    {
        $registry = PassVault_Component_Registry_Registry::getInstance();
        $registry->get('object');
    }
}
