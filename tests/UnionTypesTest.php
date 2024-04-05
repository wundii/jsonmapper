<?php

declare(strict_types=1);

/**
 * Unit tests for JsonMapper's union type handling
 *
 * @category Tools
 * @package  JsonMapper
 * @author   Christian Weiske <cweiske@cweiske.de>
 * @license  OSL-3.0 http://opensource.org/licenses/osl-3.0
 * @link     https://github.com/cweiske/jsonmapper
 * @requires PHP 8.0
 */
class UnionTypesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test for "public DateTime|string $dateOrStringNative"
     */
    public function testMapUnionNative()
    {
        $this->expectException(
            JsonMapperException::class,
            'Cannot decide which of the union types shall be used: \DateTime|string'
        );
        $jm = new JsonMapper();
        $sn = $jm->map(
            json_decode('{"dateOrStringNative":"stringvalue"}'),
            new JsonMapperTest_UnionTypes()
        );
    }

    /**
     * Test for "@var DateTime|string"
     */
    public function testMapUnionDocblock()
    {
        $this->expectException(
            JsonMapperException::class,
            'Cannot decide which of the union types shall be used: \DateTime|string'
        );
        $jm = new JsonMapper();
        $sn = $jm->map(
            json_decode('{"dateOrStringDocblock":"stringvalue"}'),
            new JsonMapperTest_UnionTypes()
        );
    }
}
