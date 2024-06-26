<?php

declare(strict_types=1);
class JsonMapperTest_DependencyInjector extends JsonMapper
{
    /**
     * Create a new object of the given type.
     *
     * This method exists to be overwritten in child classes,
     * so you can do dependency injection or so.
     *
     * @param string $class        Class name to instantiate
     * @param boolean $useParameter Pass $parameter to the constructor or not
     * @param mixed   $jvalue    Constructor parameter
     *
     * @return object Freshly created object
     */
    public function createInstance(
        string $class,
        bool $useParameter = false,
        mixed $jvalue = null
    ): object {
        $object = parent::createInstance($class, $useParameter, $jvalue);

        //dummy dependency injection
        $object->db = 'database';

        return $object;
    }
}
