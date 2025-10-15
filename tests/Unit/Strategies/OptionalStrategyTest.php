<?php

namespace Strategies;

use Xefi\Faker\Faker;
use Xefi\Faker\Strategies\OptionalStrategy;
use Xefi\Faker\Tests\Unit\TestCase;

class OptionalStrategyTest extends TestCase
{
    /**
     * @throws \ErrorException
     */
    public function testOptionalStrategyRegistered(): void
    {
        $faker = new Faker();

        $container = $faker->optional();

        $this->assertEquals(
            [new OptionalStrategy(0.5)],
            $container->getStrategies()
        );
    }

    public function testMultipleOptionalValues(): void
    {
        $faker = new Faker();

        $intArray = [];

        for($i = 0; $i < 10; $i++){
            $intArray[] = $faker->optional()->returnNumberBetween(0, 10);
        }
        var_dump($intArray);
        $this->assertTrue(count($intArray) != 10);

    }

}