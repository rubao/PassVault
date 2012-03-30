<?php

namespace PassVault\Tests\Component\Registry\RegistryTest;

use PassVault\Component\Registry\Registry;

class RegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldAddAnObjectReferenceToRegistry()
    {
        $registry = Registry::getInstance();
        $object = new \stdClass;
        $registry->register('object', $object);

        $this->assertSame($object, $registry->get('object'));
    }

    /**
     * @expectedException PassVault\Component\Registry\Exception\InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldRemoveObjectReferenceToRegistry()
    {
        $registry = Registry::getInstance();
        $object = new \stdClass;
        $registry->register('object', $object);

        $registry->unregister('object');

        $registry->get('object');
    }

    /**
     * @expectedException PassVault\Component\Registry\Exception\InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldThrowAnExceptionWhenTryToUnregisterInexistentReference()
    {
        $registry = Registry::getInstance();
        $registry->unregister('object');
    }

    /**
     * @expectedException PassVault\Component\Registry\Exception\InexistentReference
     * @expectedExceptionMessage Trying to access inexistent reference: object
     */
    public function testShouldThrowAnExceptionWhenTryToAccessANonRegisteredReference()
    {
        $registry = Registry::getInstance();
        $registry->get('object');
    }
}
